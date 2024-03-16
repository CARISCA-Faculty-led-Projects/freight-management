<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DriversController extends Controller
{
    public function index()
    {

        $drivers = DB::table('drivers')->get();
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
}
