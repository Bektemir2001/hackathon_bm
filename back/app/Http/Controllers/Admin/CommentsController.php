<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentImage;
use App\Models\CommentVideo;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommentsController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.comment.index', compact('products'));
    }

    public function addComment(Request $request){
        Comment::create([
            'product_id'=>$request->product_id,
            'user_id'=>$request->user_id,
            'comment'=>$request->comment
        ]);
        return redirect()->back();
    }

    public function addImage(Request $request){
        $image = Storage::disk('public')->put('comments', $request->image);
        $image = 'storage/'.$image;
        CommentImage::create([
            'comment_id'=>$request->comment_id,
            'image'=>$image
        ]);
        return redirect()->back();
    }

    public function getComments($product){

        $comments = Comment::where('product_id', $product)->get();
        foreach ($comments as $comment){
            $user = User::where('id', $comment->user_id)->get()[0];
            $images = CommentImage::where('comment_id', $comment->id)->get();
            $videos = CommentVideo::where('comment_id', $comment->id)->get();
            $comment->images = $images;
            $comment->videos = $videos;
            $comment->user = $user;
        }

        return view('admin.comment.show', compact('comments'));
    }
}
