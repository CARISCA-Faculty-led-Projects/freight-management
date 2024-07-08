<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SendersController extends Controller
{
    public function overview(){
        $loads = DB::table('loads')->where('sender_id',whichUser()->mask)->count();
        $delivered = DB::table('loads')->where('sender_id',whichUser()->mask)->where('shipment_status','Delivered')->count();
        $cancelled = DB::table('loads')->where('sender_id',whichUser()->mask)->where('shipment_status','Cancelled')->count();
        $pending = DB::table('loads')->where('sender_id',whichUser()->mask)->where('shipment_status','Unassigned')->count();
        
        return view('senders.overview',compact('loads','delivered','cancelled','pending'));
    }

}
