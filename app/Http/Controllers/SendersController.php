<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendersController extends Controller
{
    public function overview(){
        
        return view('senders.overview');
    }

}
