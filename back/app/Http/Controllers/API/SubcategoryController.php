<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Category;

class SubcategoryController extends Controller
{
    public function index($category){
        if($category <= 2){
            $subcategories = Subcategory::where('category_id', $category)->get();
            return response(['data' => $subcategories])->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
        }
        $name = Category::where('id', $category)->get();
        $name = $name[0]->name;
        $subcategories = Subcategory::where('name', $name)->select('id')->get();
        $ids = [];
        foreach ($subcategories as $s){
            array_push($ids, $s->id);
        }
        $products = Product::whereIn('subcategory_id', $ids)->get();
        return response(['data' => $products])->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
            ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
    }
}
