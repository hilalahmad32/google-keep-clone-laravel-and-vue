<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function users()
    {
        $users=Auth::user();
        return response()->json(['users'=>$users]);
    }
}
