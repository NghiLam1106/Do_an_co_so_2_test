<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Service\Menu\MenuService;
use App\Http\Service\Product\ProductUserService;

class HomeController extends Controller
{
    protected $MenuService;
    protected $ProductUserService;

    public function __construct(MenuService $MenuService, ProductUserService $ProductUserService) {
        $this->MenuService = $MenuService;
        $this->ProductUserService = $ProductUserService;
    }

    public function index(Request $request) {
        $title = "Trang chủ";
        $infor = $this->MenuService->listAllMenu();
        $infor_product = $this->ProductUserService->get();
        // $infor_product = $this->ProductUserService->search($request);
        return view('User.home', compact('title', 'infor_product', 'infor'));
    }

    // public function logout() {
    //     Auth::logout();
    //     $title = "Đăng nhập";
    //     return view('Admin.Account.login', compact('title'));
    // }

    public function loadProduct(Request $request) {
        $page = $request->input('page', 0);
        $result = $this->ProductUserService->get($page);
        if (count($result) != 0) {
            $html = view('User.Product.list', ['infor_product' => $result ])->render();

            return response()->json([ 'html' => $html ]);
        }

        return response()->json(['html' => '' ]);
    }
}
