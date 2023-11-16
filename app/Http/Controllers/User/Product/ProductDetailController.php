<?php

namespace App\Http\Controllers\User\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Service\Product\ProductDetailService;

class ProductDetailController extends Controller
{
    protected $ProductDetailService;

    public function __construct(ProductDetailService $ProductDetailService) {
        $this->ProductDetailService = $ProductDetailService;
    }

    public function index($id, $slug='', Request $request) {
        $infor = $this->ProductDetailService->show($id);
        $product = $this->ProductDetailService->showAll();
        $comment = $this->ProductDetailService->Comment($id);
        $title = $infor->name;
        return view('User.Product_detail.ProductDetail', compact('title','infor', 'product', 'comment'));
    }

    

    public function sendcomment(Request $request) {
        $this->ProductDetailService->sendcomment($request);
    }
}
