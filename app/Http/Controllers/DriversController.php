<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DriversController extends Controller
{
    public function overview(){
        $all = DB::table('shipments')->where('driver_id',whichUser()->mask)->count();
        $failed = DB::table('shipments')->where('driver_id',whichUser()->mask)->where('shipment_status','Cancelled')->count();
        $delivered = DB::table('shipments')->where('driver_id',whichUser()->mask)->where('shipment_status','Delivered')->count();
        $pending = DB::table('shipments')->where('driver_id',whichUser()->mask)->where('shipment_status','Assigned')->count();

        return view('fleet.drivers.overview',compact("all",'delivered','failed','pending'));
    }

    public function index()
    {

        $drivers = DB::table('drivers')->where('organization_id',whichUser()->mask)->get();

        foreach($drivers as $driver){
            $vehicle = DB::table('vehicles')->where('driver_id',$driver->mask)->first(['number']);
            if($vehicle){
                $driver->vehicle = $vehicle->number;
            }else{
                $driver->vehicle =null;
            }
        }
        return view('fleet.drivers.drivers', compact('drivers'));
    }

    public function delete($mask)
    {
        DB::table('drivers')->where('mask', $mask)->delete();
        // DB::table('vehicle_routes')->where('vehicle_id',$mask)->delete();

        return redirect()->back()->with('success', 'Driver deleted successfully');
    }

    public function details($mask)
    {
        $driver = DB::table('drivers')->where('mask', $mask)->first();
        $org = DB::table('organizations')->where('mask',$driver->organization_id)->first();

        return view('fleet.drivers.details', compact('driver','org'));
    }

    public function shipments(){
        $shipments = DB::table('shipments')->where("driver_id",whichUser()->mask)->orderByDesc('created_at')->get();
        return view('fleet.drivers.shipments',compact('shipments'));
    }

    public function profile(){
        $driver = DB::table('drivers')->where('mask',whichUser()->mask)->first();
        return view('fleet.drivers.edit',compact('driver'));
    }
}
