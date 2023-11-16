<?php
namespace App\Http\Service\Product;

use App\Models\Menu;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductDetailService {

    public function show($id) {
        return Product::where('id', $id)->with('menu')->first();
        // return DB::table('products') // Thay 'products' bằng tên bảng cơ sở dữ liệu của bạn
        // ->select('size', 'mausac')
        // ->where('id', '=', $id)
        // ->get();
    
    }

    // public function showMenu() {
    //     return DB::table('menus') // Thay 'products' bằng tên bảng cơ sở dữ liệu của bạn
    //     ->select('id', 'name')
    //     ->get();
    // }

    public function showAll() {
        return DB::table('products')->get();
    }

    // 
    public function Comment($id) {
        $product_id = $id;
        // dd($product_id);
        return Comment::where('comment_product_id', $product_id)->get();
    }
}

?>