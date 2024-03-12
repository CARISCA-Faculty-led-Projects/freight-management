<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DriversController extends Controller
{
    public function index(){

        $drivers = DB::table('drivers')->get();
        return view('fleet.drivers.drivers',compact('drivers'));
    }
}
