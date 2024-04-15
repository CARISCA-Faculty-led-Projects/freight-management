<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrokersController extends Controller
{
    public function overview(){
        
        return view('brokers.overview');
    }

}
