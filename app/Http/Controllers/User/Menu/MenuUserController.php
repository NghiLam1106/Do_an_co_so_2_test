<?php

namespace App\Http\Controllers\User\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Service\Menu\MenuService;

class MenuUserController extends Controller
{
    protected $MenuService;

    public function __construct(MenuService $MenuService) {
        $this->MenuService = $MenuService;
    }

    public function index(Request $request, $id, $slug) {
        $menu = $this->MenuService->getId($id);
        $infor = $this->MenuService->listAllMenu();
        $infor_product = $this->MenuService->getProduct($menu, $request);
        $title = $menu->name;
        return view('User.CuaHang.cuahang', compact('title', 'infor_product', 'infor'));
    }
}
