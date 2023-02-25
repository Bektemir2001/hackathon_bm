<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\SendVerificationCodeMail;
use App\Models\OrderVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function register(Request $request){
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'token' => Hash::make($request->password)
            ];
            $user = User::create($data);
            $code = random_int(100000, 999999);
            OrderVerification::create([
                'user_id' => $user->id,
                'code' => $code
            ]);
            Mail::to($user->email)->send(new SendVerificationCodeMail($code));
            return response(['code' => $code, 'user_id'=>$user->id])->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
        }
        catch (\Exception $e){
            return response(['error' => $e])->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
        }
    }

    public function fastRegister(Request $request){
        $data = [
                'name' => 'grtse',
                'email' => $request->email,
                'password' => null,
                'token' => Hash::make($request->email)
            ];
        $user = User::create($data);
        $user->update(['name' => 'user'.$user->id]);
        $code = random_int(100000, 999999);
        OrderVerification::create([
            'user_id' => $user->id,
            'code' => $code
        ]);
        Mail::to($user->email)->send(new SendVerificationCodeMail($code));
        return response(['data' => ['code' => $code, 'user_id'=>$user->id]])->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
            ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
    }

    public function verification(User $user){
        $veri = OrderVerification::where('user_id', $user->id)->get()[0];
        $veri->delete();
        return response(['data' => $user])->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
            ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
    }
}
