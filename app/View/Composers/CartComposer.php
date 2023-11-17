<?php


namespace App\View\Composers;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class CartComposer
{
    protected $users;

    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);
        $products = Product::select('id', 'nameproduct', 'price', 'hinhanhproduct')
            ->whereIn('id', $productId)
            ->get();

        $view->with('products', $products);
        $view->with('carts', $carts);
    }
}