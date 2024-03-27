<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehiclesController extends Controller
{
    //

    public function index()
    {
        $vehicles = DB::table('vehicles')
            ->join('vehicle_owners', 'vehicle_owners.id', 'vehicles.owner_id')
            ->select('vehicles.make', 'vehicles.model', 'vehicles.engine_type', 'vehicles.gps', 'vehicle_owners.name as owner', 'vehicles.gps', 'vehicles.mask')
            ->get();
        return view('fleet.vehicles.vehicles', compact('vehicles'));
    }

    public function delete($vehicle)
    {
        DB::table('vehicles')->where('mask', $vehicle)->delete();
        DB::table('vehicle_routes')->where('vehicle_id', $vehicle)->delete();
        DB::table('vehicle_owners')->where('vehicle_id', $vehicle)->delete();

        return redirect()->back()->with('success', 'Vehicle deleted successfully');
    }

    public function edit($mask)
    {
        $vehicle =  DB::table('vehicles')->where('mask', $mask)->first();
        $vehicle_routes = DB::table('vehicle_routes')->where('vehicle_id', $mask)->first();
        $vehicle_owners = DB::table('vehicle_owners')->where('vehicle_id', $mask)->first();

        return view('fleet.vehicles.edit', compact('vehicle', "vehicle_routes", 'vehicle_owners'));
    }

    public function details($mask)
    {
        $vehicle =  DB::table('vehicles')->where('mask', $mask)->first();
        $vehicle_routes = DB::table('vehicle_routes')->where('vehicle_id', $mask)->get();
        $vehicle_owner = $vehicle->organization_id ? DB::table('organizations')->where("mask",$vehicle->organization_id)->first() : DB::table('vehicle_owners')->where('vehicle_id', $mask)->first();

        $organization = null;
        $driver = null;

        return view('fleet.vehicles.details', compact('vehicle', "vehicle_routes", 'vehicle_owner','organization','driver'));
    }

    public function maintenance_logs($vehicle){

        return view('fleet.vehicles.maintenance.view',compact('vehicle'));
    }

    public function add_maintenance(){

        return view('fleet.vehicles.maintenance.add');
    }
}
