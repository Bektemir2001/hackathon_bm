<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class SubcategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.subcategory.index', compact('categories', 'subcategories'));
    }
    public function store(Request $request){
        $image = Storage::disk('public')->put('subcategories', $request->image);
        $image = 'storage/'.$image;
        Subcategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image' => $image
        ]);
        return redirect()->route('admin.subcategory.index');
    }
}
