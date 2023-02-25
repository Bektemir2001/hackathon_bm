<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Colors;
use App\Models\CountProduct;
use App\Models\Gallery;
use App\Models\Size;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        $subcategories = Subcategory::all();
        return  view('admin.product.index', compact('products', 'subcategories'));
    }

    public function store(Request $request){
        Product::create([
            'name' => $request->name,
            'subcategory_id' => $request->subcategory_id,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->image
        ]);

        return redirect()->route('admin.product.index');
    }

    public function show(Product $product){
        $colors = Colors::all();
        $sizes = Size::all();
        $product_c = CountProduct::where('product_id', $product->id)->get();
        $gallery = Gallery::where('product_id', $product->id)->get();
        return view('admin.product.show', compact('product', 'sizes', 'colors', 'product_c', 'gallery'));
    }

    public function productCreate(Request $request, $id){
        CountProduct::create([
            'product_id' => $id,
            'color_id' => $request->color_id,
            'size_id' => $request->size_id,
            'count' => $request->count,
            'image' => $request->image
        ]);

        return redirect()->back();
    }

    public function addPhoto(Request $request, $id){
        Gallery::create([
           'product_id' => $id,
           'image' => $request->image
        ]);

        return redirect()->back();
    }
}
