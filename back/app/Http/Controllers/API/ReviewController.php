<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Grade;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(Request $request){
        Grade::create([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'grade' => $request->grade
        ]);
        Comment::create([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'comment' => $request->comment
        ]);

    }
}
