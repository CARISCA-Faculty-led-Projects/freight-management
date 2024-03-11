<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehiclesController extends Controller
{
    //

    public function index(){
        $vehicles = DB::table('vehicles')
        ->join('organizations','organizations.mask','vehicles.organization_id')
        ->join('vehicle_owners','vehicle_owners.id','vehicles.owner_id')
        ->select('organizations.name as organization','vehicles.make','vehicles.model','vehicles.engine_type','vehicles.gps','vehicle_owners.name as owner','vehicles.gps')
        ->get();
        return view('fleet.vehicles.vehicles',compact('vehicles'));
    }
}
