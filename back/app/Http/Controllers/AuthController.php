<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __invoke(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', $email)->get();
        if(count($user) == 0){
            return response(['error' => 'user not fount'])->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
        }


        if(Hash::check($password, $user[0]->token)){
            return response(['data' => $user[0]])->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
        }
        else{
            return response(['error' => 'password incorrect'])->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
        }

    }
}
