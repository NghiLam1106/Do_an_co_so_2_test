<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Service\Product\ProductService;
use App\Http\Requests\Product\ProductRequest;

class ProductController extends Controller
{
    protected $ProductService;

    public function __construct(ProductService $ProductService) {
        $this->ProductService = $ProductService;
    }

    public function index() {
        $title = "Thêm sản phẩm";
        $infor = $this->ProductService->getMenu_id();
        return view('Admin.Product.add', compact('title', 'infor'));
    }

    // Thêm sản phẩm
    public function addProduct(ProductRequest $request) {
        $this->ProductService->addProduct($request);

        return redirect()->route('addProduct');
    }

    // Lấy danh sách sản phẩm
    public function listProduct() {
        $title = 'Danh sách sản phẩm';
        $infor = $this->ProductService->listProduct();
        // dd($infor);
        return view('Admin.Product.list', compact('title', 'infor'));
    }

    // Lấy dữ liệu theo id
    public function getEdit(Request $request, $id) {
        $title = "Cập nhật sản phẩm";
        if (!empty($id)) {
            $infor = $this->ProductService->getEdit($id);
            if (!empty($infor[0])) {
                $menu_id = $this->ProductService->getMenu_id();
                $request->session()->put('id', $id);
                $infor = $infor[0];
            }
        }
        else {
            session()->flash('error', 'Sản phẩm không tồn tại');
            return redirect()->route('list');
        }
        return view('Admin.Product.edit', compact('title', 'infor', 'menu_id'));
    }

    // // Cập nhật sản phẩm
    public function postEdit(Request $request) {
        $id = session('id');
        $this->ProductService->updateProduct($request, $id);
        session()->flash('susscess', 'Sản phẩm cập nhật thành công');
        return redirect()->route('productlist');
    }

    // Cập nhật sản phẩm
    // public function postEdit(Request $request, Product $product) {
    //     $this->ProductService->updateProduct($request, $product);
    //     return redirect()->route('productlist');
    // }

    // Xóa sản phẩm
    public function delete($id) {
        $this->ProductService->delete($id);

        return redirect()->back();
    }

    // Tìm kiếm sản phẩm
    public function search($slug) {
        $this->ProductService->search($slug);
        return redirect()->back();
    }
}
