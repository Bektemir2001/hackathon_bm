<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
    public function store(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'token' => Hash::make($request->password)
        ]);

        return redirect()->back();
    }
}
