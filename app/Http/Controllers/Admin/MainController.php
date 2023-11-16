<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\View; 
use App\Http\Controllers\Controller;
use App\Http\Service\Menu\MenuService;
use App\Http\Service\Product\ProductUserService;

class MainController extends Controller
{
    protected $ProductUserService;
    protected $MenuService;

    public function __construct(ProductUserService $ProductUserService, MenuService $MenuService) {
        $this->ProductUserService = $ProductUserService;
        $this->MenuService = $MenuService;
    }

    // Trang của hàng
    public function cuahang_index(Request $request) {
        $title = "Cửa hàng";
        $infor = $this->ProductUserService->listAllMenu();
        $infor_product = $this->ProductUserService->getProduct($request);
        // $infor_product = $this->ProductUserService->getProductByColor($request);
        // $infor_product = $this->ProductUserService->search($request);
        return view('User.CuaHang.Cuahang', compact('title', 'infor_product', 'infor'));
    }

}
