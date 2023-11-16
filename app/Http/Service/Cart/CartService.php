<?php
namespace App\Http\Service\Cart;

use DB;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;


class CartService {

    public function create($request)
    {
        $qty = (int)$request->input('num_product');
        $product_id = (int)$request->input('product_id');

        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng hoặc Sản phẩm không chính xác');
            return false;
        }

        $carts = Session::get('carts');
        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }
        $exists = Arr::exists($carts, $product_id); // Có tồn tại sản phẩm trong session ko
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
            return true;
        }
        
        $carts[$product_id] = $qty;
        Session::put('carts', $carts);
        return true;
    }

    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);
        return Product::select('id', 'name', 'price', 'hinhanh')
            ->whereIn('id', $productId)
            ->get();
    }

    public function update($request) {
        Session::put('carts', $request->input('num_product'));

        return true;
    }

    public function remove($id) {
        $carts = Session::get('carts'); // Lấy sản phẩm trong session
        unset($carts[$id]); // Xóa 

        // Cập nhật lại
        Session::put('carts', $carts);
        return true;
    }

    // 
    public function addCart($request) {
        try {
            DB::beginTransaction(); // kiểm tra có lỗi hay không, nếu lỗi sẽ rollback()
            
            $carts = Session::get('carts');
            if (is_null($carts)) return false;

            $customer = Customer::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'content' => $request->input('content')
            ]);

            $this->infoProductCart($carts, $customer->id);

            DB::commit(); // Kiểm tra nếu ko lỗi sẽ chạy cái này
            $request->session()->flash('susscess', 'Đặt hàng thành công');

            Session::forget('carts');
        } catch (\Exception $th) {
            DB::rollBack();
            $request->session()->flash('error', 'Đặt Hàng Lỗi, Vui lòng thử lại sau');
            return false;
        }
        return true;
    }

    public function infoProductCart($carts, $customer_id) {
        $productId = array_keys($carts);
        $products = Product::select('id', 'nameproduct', 'price', 'hinhanh')
            ->whereIn('id', $productId)
            ->get();
            
        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'pty'   => $carts[$product->id],
                'price' => $product->price
            ];
        }

        return Cart::insert($data);
    }
}

?>