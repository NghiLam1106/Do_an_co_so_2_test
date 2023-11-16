<?php
namespace App\Http\Service\Product;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductService {

    // Lấy danh sách tên danh mục
    public function getMenu_id() {
        $result = DB::table('menus')->get();
        return $result;
    }

    // Hàm thêm sản phẩm
    public function addProduct($request) {
        try {
            Product::create($request->all());

            $request->session()->flash('susscess', 'Thêm sản phẩm thành công');
        } catch (\Exception $er) {
            $request->session()->flash('error', $er->getMessage());
            return false;
        }
        return true;
    }

    // Hàm lấy tất cả dữ liệu của sản phẩm
    public function listProduct() {
        return DB::table('products')->join('menus', 'products.menu_id', '=', 'menus.id')->paginate(10)->withQueryString(); // Phân trang: Một trang hiển thị 10 sản phẩm
    }

    // Hàm lấy dữ liệu sản phảm theo id
    public function getEdit($id) {
        return DB::table('products')->where('id', '=', $id)->get();
    }

    // Hàm cập nhật sản phẩm 
    public function updateProduct($request, $id) {
        $file = $request->file('hinhanh'); // Lấy file

        if ($file) { // Nếu file tồn tại thì chạy cái này
            
            return DB::table('products')->where('id', '=', $id)->update([
                'nameproduct' => $request->input('name'),
                'content' => $request->input('content'),
                'menu_id' => $request->input('menu_id'),
                'price' => $request->input('price'),
                'hinhanhproduct' => $request->input('hinhanh'),
                'soluong' => $request->input('soluong'),
                'mausac' => $request->input('mausac'),
                'size' => $request->input('size')
            ]);
        }
        else { // Nếu file không tồn tại thì chạy cái này
            return DB::table('products')->where('id', '=', $id)->update([
                'nameproduct' => $request->input('name'),
                'content' => $request->input('content'),
                'menu_id' => $request->input('menu_id'),
                'price' => $request->input('price'),
                'soluong' => $request->input('soluong'),
                'mausac' => $request->input('mausac'),
                'size' => $request->input('size')
            ]);
        }
    }

    // Hàm xóa sản phẩm
    public function delete($id) {
        return DB::table('products')->where('id', '=', $id)->delete();
    }
}