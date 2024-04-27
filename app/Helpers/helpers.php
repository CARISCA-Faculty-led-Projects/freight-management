<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

function generateAccNumber()
{
    $code = 0;
    do {
        $code = mt_rand(00000000, 93840098);
    } while (strlen($code) < 8);
    return $code;
}

function generateTaxnNumber(){
    $code = 0;
    do {
        $code = mt_rand(0000, 9999);
    } while (strlen($code) < 4);
    return $code;
}

function generateNumber(){
    $code = 0;
    do {
        $code = mt_rand(0000, 9999);
    } while (strlen($code) < 6);
    return $code;
}

function whichUser(){
    // dd(Auth::user());
    $user = session('user_id') == null ? Auth::user()->mask : session('user_id');
    $guard = 'web';

    if(auth()->guard()->name != "web"){
        $guard = auth()->guard()->name;
    }

    $level = DB::table($guard != 'web' ? $guard :"users")->where('mask',$user)->first();
    return $level;
}
