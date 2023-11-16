<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Service\Menu\MenuService;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\User\LoginRequest;
use App\Http\Service\Product\ProductUserService;

class LoginController extends Controller
{

    protected $MenuService;

    public function __construct(MenuService $MenuService, ProductUserService $ProductUserService) {
        $this->MenuService = $MenuService;
        $this->ProductUserService = $ProductUserService;
    }

    public function index() {
        $title = "Đăng nhập";
        return view('Admin.Account.login', compact('title'));
    }

    public function check(LoginRequest $request) {
        if (Auth::attempt(['name' => $request->input('name'), 'password' => $request->input('password')])) {
            $user = Auth::user();
            if ($user->DEC === 'ADMIN') {
                return redirect()->route('admin_home');
            }
            elseif ($user->DEC === 'USER') {
                // $title = "Trang chủ";
                // $infor = $this->MenuService->listAllMenu();
                // $infor_product = $this->ProductUserService->get();
                // return view('User.home', compact('title', 'infor', 'infor_product'));
                return redirect()->route('user_home');
            }
        }
        $request->session()->flash('error', 'Vui lòng kiểm tra thông tin');
        return redirect()->back();
    }
}
