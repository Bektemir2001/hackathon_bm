<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'token' => Hash::make($request->password)
            ];
            $user = User::create($data);
            return response(['data' => $user])->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
        }
        catch (\Exception $e){
            return response(['error' => $e])->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
        }

    }
}
