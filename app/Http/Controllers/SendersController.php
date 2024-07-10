<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SendersController extends Controller
{
    use ResponseTrait;
    
    public function overview(){
        $loads = DB::table('loads')->where('sender_id',whichUser()->mask)->count();
        $delivered = DB::table('loads')->where('sender_id',whichUser()->mask)->where('shipment_status','Delivered')->count();
        $cancelled = DB::table('loads')->where('sender_id',whichUser()->mask)->where('shipment_status','Cancelled')->count();
        $pending = DB::table('loads')->where('sender_id',whichUser()->mask)->where('shipment_status','Unassigned')->count();
        
        return view('senders.overview',compact('loads','delivered','cancelled','pending'));
    }

    public function dashboardCharts()
    {
        $lpm = [];
        $months = getMonths();

        // Shipments per month of the year
        for ($m = 1; $m <= 12; $m++) {
            $loads = DB::table('loads')->where('sender_id', whichUser()->mask)->whereMonth('created_at', $m)->count();
            array_push($lpm, ['months' => $months[$m - 1], 'qty' => $loads]);
        }
        return $this->successResponse('', ["lpm" => $lpm]);
    }


}
