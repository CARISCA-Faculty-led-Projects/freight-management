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
        $shipments = DB::table('shipments')->where('driver_id', auth()->user()->mask)->get(['mask', 'description', 'shipment_status']);
        return $this->successResponse('', $shipments);
    }

    public function start_shipment($shipment)
    {
        $shipment_on_route = DB::table('shipments')->where('driver_id', auth()->user()->mask)->where('shipment_status', 'On route')->exists();
        $shipment_start = DB::table('shipments')->where('driver_id', auth()->user()->mask)->where('mask', $shipment);

        if ($shipment_on_route) {
            return $this->errorResponse('a shipment has already started');
        } else {
            if ($shipment_start->first()->shipment_status == 'On route') {
                return $this->errorResponse('this shipment has already started');
            } else {
                $shipment_start->update(['shipment_status' => 'On route']);
                return $this->successResponse('Shipment started');
            }
        }
    }
    public function cancel_shipment($shipment)
    {
        $shipment_on_route = DB::table('shipments')->where('driver_id', auth()->user()->mask)->where('mask', $shipment)->where('shipment_status', 'On route');

        if ($shipment_on_route->exists()) {
            $shipment_on_route->update(['shipment_status' => 'Cancelled']);
            return $this->successResponse('Shipment cancelled');
        }else{
            return $this->successResponse('Shipment not started or already cancelled',);

        }
    }


    public function viewShipment($shipment)
    {
        $shipment = DB::table('shipments')->where('mask', $shipment)->first(['pickup_date as start_date', 'created_at', 'description', 'starting_point', 'pickup_address as starting_point_address', 'destination', 'dropoff_address as destination_address', 'mask', 'loads', 'route','shipment_status']);
        // $broker = DB::table('brokers')->where('mask',$shipment->broker_id)->first();
        // $shipment->broker_name = $broker->name;
        // dd($broker);

        return $this->successResponse('', $shipment);
    }

    public function viewShipmentLoads($shipment)
    {
        $shipment_loads = DB::table('shipments')->where('mask', $shipment)->pluck('loads')->first();

        $load_ids = json_decode($shipment_loads);
        $loads = DB::table('loads')->whereIn('mask',$load_ids)->get(['image','load_type','description','quantity','length','weight','height','breadth','handling','pickup_address','dropoff_address','mask','shipment_status','sender_id']);
        // $broker = DB::table('brokers')->where('mask',$shipment->broker_id)->first();
        // $shipment->broker_name = $broker->name;
        // dd($broker);
        foreach($loads as $load){
            $load->dropoff_address = json_decode($load->dropoff_address);
            $load->pickup_address = json_decode($load->pickup_address);
            $sender = DB::table('senders')->where('mask',$load->sender_id)->first(['name','email','phone']);
            $load->sender = $sender;
        }

        return $this->successResponse('', $loads);
    }
}
