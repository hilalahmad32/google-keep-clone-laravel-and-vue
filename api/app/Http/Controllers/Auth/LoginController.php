<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user=Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if($user){
            $users=Auth::user();
            $token=$users->createToken("token")->plainTextToken;
            return response()->json(['token'=>$token,'success'=>true]);
        }else{
            return response()->json(['success'=>false]);
        }
    }
}
