<?php
namespace App\Http\Service\Product;

use App\Models\Menu;
use App\Models\Rating;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductDetailService {

    // Hiển thị thông tin sản phẩm theo id sản phẩm
    public function show($id) {
        return Product::where('id', $id)->with('menu')->first();
    }

    // Liệt kê sản phẩm theo danh mục
    public function showAll($infor) {
        return DB::table('products')->where('menu_id', '=', $infor->menu_id)->get();
    }

    // Liệt kê bình luận theo id sản phẩm
    public function Comment($id) {
        $product_id = $id;
        // dd($product_id);
        return Comment::where('comment_product_id', $product_id)->get();
    }
}

?>