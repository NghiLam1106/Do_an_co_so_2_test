<?php

namespace App\Http\Controllers\Admin\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Service\Menu\MenuService;
use App\Http\Requests\Menu\MenuRequest;

class MenuController extends Controller
{
    protected MenuService $MenuService;

    public function __construct(MenuService $MenuService) {
        $this->MenuService = $MenuService;
    }

    public function index() {
        $title = "Thêm danh mục";
        return view('Admin.Menu.add', compact('title'));
    }

    // Thêm danh mục
    public function addMenu(MenuRequest $request) {
        $this->MenuService->addMenu($request);
        return redirect()->route('addMenu');
    }

    // Liệt kê danh mục
    public function listMenu() {
        $title = "Danh sách danh mục";
        $infor = $this->MenuService->listAllMenu();
        return view('Admin.Menu.list', compact('title', 'infor'));
    }

    // Liệt kê danh mục theo id
    public function getEdit(Request $request, $id) {
        $title = "Cập nhật danh mục";
        if (!empty($id)) {
            $infor = $this->MenuService->listMenuByid($id);
            if (!empty($infor[0])) {
                $request->session()->put('id', $id);
                $infor = $infor[0];
            }
            // dd($infor);
        }
        else {
            session()->flash('error', 'Danh mục không tồn tại');
            return redirect()->route('list');
        }
        return view('Admin.Menu.edit', compact('title', 'infor'));
    }

    // Chỉnh sửa danh mục
    public function postEdit(Request $request) {
        $id = session('id');
        $this->MenuService->updateMenu($request, $id);
        session()->flash('susscess', 'Danh mục cập nhật thành công');
        return redirect()->route('Menulist');
    }

    // Xóa danh mục
    public function delete($id) {
        $this->MenuService->delete($id);

        return redirect()->back();
    }
}
