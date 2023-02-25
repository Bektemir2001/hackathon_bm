<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Colors;
use App\Models\CountProduct;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchProduct(Request $request){
        $products = Product::where('name', 'LIKE', '%'.$request->search.'%')->get();
        foreach($products as $product){
            $gallery = Gallery::where('product_id', $product->id)->get();
            $pr_s = CountProduct::where('product_id', $product->id)->get();
            $colors = [];
            foreach ($pr_s as $p){
                $tmp = ['color_id' => $p->color_id,
                    'color' => Colors::where('id', $p->color_id)->get()[0]->color,
                    'image' => $p->image
                ];
                $is_color_exist = false;
                foreach ($colors as $color){
                    if($color['color_id'] == $tmp['color_id']){
                        $is_color_exist = true;
                    }
                }
                if($is_color_exist == false){
                    array_push($colors, $tmp);
                }

            }
            $product->colors = $colors;

        }
        return response(['data' => $products])->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
            ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));


    }
}
