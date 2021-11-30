<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(Request $request)
    {
        $users=new User();
        $is_email=User::where('email',$request->email)->first();
        if($is_email){
            return response()->json(['exist'=>true]);
        }else{
            $filename="";
            if($request->hasFile('image')){
                $filename=$request->file('image')->store('users','public');
            }else{
                $filename="";
            }
            $users->name=$request->name;
            $users->email=$request->email;
            $users->image=$filename;
            $users->password=Hash::make($request->password);
            $result=$users->save();
            if($result){
                return response()->json(['success'=>true]);
            }else{
                return response()->json(['success'=>false]);
            }
            // now test the api
        }
    }
}
