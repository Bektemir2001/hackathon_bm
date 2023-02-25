<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Colors;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index(){
        $colors = Colors::all();
        return view('admin.colors.index', compact('colors'));
    }

    public function store(Request $request){
        Colors::create([
            'name' => $request->name,
            'color' => $request->color
        ]);

        return redirect()->route('admin.color.index');
    }
}
