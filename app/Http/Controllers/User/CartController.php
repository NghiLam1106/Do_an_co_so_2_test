<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Service\Cart\CartService;
use App\Http\Requests\Cart\CartRequest;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    protected $CartService;

    public function __construct(CartService $CartService) {
        $this->CartService = $CartService;
    }

    public function index(Request $request) {
        $result = $this->CartService->create($request);
        // dd(Session::get('carts'));
        if ($result === false) {
            return redirect()->back();
        }
        // dd($result);
        // return redirect('/carts');
        return redirect()->back();
    }

    // Hiển thị giỏ hàng
    public function show() {
        $products = $this->CartService->getProduct();

        return view::first(['User.Cart.list','User.home'], [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }

    // Cập nhật giỏ hàng
    public function update(Request $request) {
        $this->CartService->update($request);

        return redirect('/carts');
    }

    // Xóa giỏ hàng
    public function remove($id) {
        $this->CartService->remove($id);
        return redirect('/carts');
    }

    // Xác nhận giỏ hàng
    public function addCart(CartRequest $request) {
        $this->CartService->addCart($request);

        return redirect()->back();
    }
}
