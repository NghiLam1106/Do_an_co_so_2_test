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
        $user = Auth::user()->name;
        $hinhanh = Auth::user()->hinhanh;
        $commentnha = $request->input('comment');
        $comment_name = $user;
        // $rating = $request->has('rating_star') ? (int)$request->input('rating_star') : 0;
        $comment_star = (int)$request->input('rating');
        $user = $request->input('user_id');

        $rating = DB::table('ratings')->insert([
            'rating' => $comment_star,
            'product_id' => $request->input('comment_product_id'),
            'user_id' => $user
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
                'rating' => $comment_star
            ]);
        }

        return response()->json(['error' => true]);
    }
}
