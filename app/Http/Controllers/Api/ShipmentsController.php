<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ShipmentsController extends Controller
{
    use ResponseTrait;

    public function driver_shipments()
    {
        $shipments = DB::table('shipments')->where('driver_id',auth()->user()->mask)->get(['mask','description','shipment_status']);
        return $this->successResponse('',$shipments );
    }

    public function start_shipment($shipment){
        $shipment = DB::table('shipments')->where('driver_id',auth()->user()->mask)->where('shipment_status','On route')->exists();
        
    }
}
