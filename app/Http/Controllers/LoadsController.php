<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoadsController extends Controller
{
    public function index(){

        $loads = DB::table('loads')->get();

        return view('load.list',compact('loads'));
    }


    public function edit(){
        return view('load.edit');
    }

    public function delete($load_id){

        DB::table('loads')->where('mask',$load_id)->delete();
        DB::table('sub_loads')->where('load_id',$load_id)->delete();

        return back()->with('success',"Load Deleted");

    }

    public function details($load_id){
        $load = DB::table('loads')->where('mask',$load_id)->first();
        $subload = DB::table('sub_loads')->where('load_id',$load_id)->get();

        return view('load.details',compact('load','subload'));
    }

    // Sender
    public function s_index(){

        $loads = DB::table('loads')->where('sender_id',Auth::user()->mask)->get();

        return view('load.list',compact('loads'));
    }
}
