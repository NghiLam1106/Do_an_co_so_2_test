<?php
namespace App\Http\Service\Comment;

use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class CommentService {
    // 
    // public function Comment($id) {
    //     $product_id = $id;
    //     return Comment::where('comment_product_id', $product_id)->get();
    // }

    public function sendcomment($request) {
        try {
            DB::table('comments')->insert([
                'comment_user_name' => $request->input('comment_user_name'),
                'comment_product_id' => $request->input('comment_product_id'),
                'commet' => $request->input('comment')
            ]);
        } catch (\Exception $th) {
            return false;
        }
        return true;
    }
}
?>