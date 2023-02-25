<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
    public function index(){
        $sizes = Size::all();
        return view('admin.size.index', compact('sizes'));
    }

    public function store(Request $request){
        Size::create([
            'size' => $request->size
        ]);
        return redirect()->route('admin.size.index');
    }
}
