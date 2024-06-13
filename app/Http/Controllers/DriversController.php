<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DriversController extends Controller
{
    public function overview(){

        return view('fleet.drivers.overview');
    }

    public function index()
    {

        $drivers = DB::table('drivers')->where('organization_id',whichUser()->mask)->get();
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

        return view('fleet.drivers.details', compact('driver'));
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
