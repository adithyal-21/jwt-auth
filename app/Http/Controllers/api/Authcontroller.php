<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('jwtauth')->except('login');
    }
    public function login(Request $request)
    {
        $check=$request->only('email','password');
        if(!$token=JWTAuth::attempt($check))
        {
            return response()->json(['success'=>false],401);
        }
        else{
            return response()->json(['success'=>true,'token'=>$token],200);
        }
    }
    public function checktoken()
    {
        return response()->json(['success'=>true],200);
        }
        public function logout()
        {
            $logout=  Auth::logout();;
            return response()->json(['success'=>true],200);

        }
}
