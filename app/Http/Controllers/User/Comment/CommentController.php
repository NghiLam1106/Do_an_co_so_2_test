<?php

namespace App\Http\Controllers\User\Comment;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Service\Comment\CommentService;

class CommentController extends Controller
{
    protected $CommentService;

    public function __construct(CommentService $CommentService) {
        $this->CommentService = $CommentService;
    }


    public function sendcomment(Request $request) {
        
        $user_id = $request->input('user_id');

        if (empty($user_id)) {
            echo '<scrip>alert("Mỗi tài khoản chỉ được bình luận 1 lần:")</scrip>';
        } else {
            $user = Auth::user()->name;
            $hinhanh = Auth::user()->hinhanh;
            $commentnha = $request->input('comment');
            $comment_name = $user;
            $rating = (int)$request->input('rating');

            $rating = DB::table('ratings')->insert([
                'rating' => $rating ,
                'product_id' => $request->input('comment_product_id'),
                'user_id' => $user_id
            ]);
    
            // $rating = Rating::create($request->all());
    
            $comment = DB::table('comments')->insert([
                'comment_user_name' => $comment_name,
                'comment_product_id' => $request->input('comment_product_id'),
                'commet' => $commentnha,
                'hinhanh' => $hinhanh,
            ]);

            if ($comment) {
                return response()->json([
                    'error' => false,
                    'comment' => $commentnha,
                    'comment_name' => $comment_name,
                    'hinhanh' => $hinhanh,
                    'rating' => DB::table('ratings')->select('rating')->where('product_id', $request->input('comment_product_id'))->avg('rating')
                ]);
            }
    
            return response()->json(['error' => true]);
        }
    }
}
