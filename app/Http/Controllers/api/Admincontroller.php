<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Admincontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index(){
        return response()->json(['success'=>true,'message'=>'you are in dashboard']);
    }
}
