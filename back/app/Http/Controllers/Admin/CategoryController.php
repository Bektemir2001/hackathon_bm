<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function show(){
        return [];
    }

    public function create(){
        return [];
    }

    public function store(Request $request){
        $image = Storage::disk('public')->put('categories', $request->image);
        $image = 'storage/'.$image;
        Category::create([
           'name' => $request->name,
           'image' => $image
        ]);
        return redirect()->route('admin.category.index');
    }
}
