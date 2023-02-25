<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Colors;
use App\Models\CountProduct;
use App\Models\Favorite;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function create(Request $request){
        Favorite::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id
        ]);

        return response([])->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
            ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));;
    }

    public function index($user){

        $favorites = Favorite::where('user_id', $user)->select('product_id')->get();
        $products = Product::whereIn('id', $favorites)->get();
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
//        dd($products);
        return response(['data' => $products])->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
            ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
    }
}
