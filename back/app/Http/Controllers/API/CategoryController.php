<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

        return response(['data' => $categories])->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
            ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
    }
}
