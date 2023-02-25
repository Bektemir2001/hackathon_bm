<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function addProduct(Request $request){
        $user = $request->user_id;
        $basket = Basket::where('user_id', $user)->get();
        if(count($basket) == 0){
            $basket = Basket::create([
                'user_id' => $user,
                'price' => Product::where('id', $request->product_id)->get()[0]->price * $request->count,
            ]);

        }

    }
}
