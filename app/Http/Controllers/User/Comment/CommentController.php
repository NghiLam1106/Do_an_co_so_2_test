<?php

namespace App\Http\Controllers\User\Comment;

use App\Models\Rating;
use App\Models\Comment;
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
        $productId = $request->input('comment_product_id');
        // $user_name = Comment::where('comment_product_id', $productId)->get();
        $user_name = Comment::where('comment_product_id', $productId)->pluck('comment_user_name')->toArray();
        $user = Auth::user()->name;
        $hinhanh = Auth::user()->hinhanh;
        $commentnha = $request->input('comment');
        $rating = (int)$request->input('rating');

        if (is_array($user_name) && in_array($user, $user_name)) {
            return response()->json(['error' => true]);
        } else {
            $comment = DB::table('comments')->insert([
                'comment_user_name' => $user,
                'comment_product_id' => $request->input('comment_product_id'),
                'commet' => $commentnha,
                'hinhanh' => $hinhanh,
                'rating' => $rating
            ]);

            if ($comment) {
                return response()->json([
                    'error' => false,
                    'comment' => $commentnha,
                    'comment_name' => $user,
                    'hinhanh' => $hinhanh,
                    'rating' => (int)$request->input('rating')
                ]);
            }
        }
    }
}
