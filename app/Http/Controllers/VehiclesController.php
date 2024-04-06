<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VehiclesController extends Controller
{
    //

    public function index()
    {
        $vehicles = DB::table('vehicles')
            ->join('vehicle_owners', 'vehicle_owners.id', 'vehicles.owner_id')
            ->select('vehicles.make', 'vehicles.model', 'vehicles.engine_type', 'vehicles.gps', 'vehicle_owners.name as owner', 'vehicles.gps', 'vehicles.mask','vehicles.number')
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
        $veh = DB::table('vehicles')->where("mask",$vehicle)->first();
        $logs = DB::table('maintenance_schedule')->where("vehicle_id",$vehicle)->get();

        return view('fleet.vehicles.maintenance.view',compact('vehicle','veh','logs'));
    }

    public function add_maintenance($vehicle){
        $tasks = DB::table('maintenance_tasks')->pluck('name')->toArray();

        return view('fleet.vehicles.maintenance.add', compact('vehicle','tasks'));
    }

    public function store_maintenance(Request $request,$vehicle){
        $validated = Validator::make($request->all(), [
        'status' => 'required',
        'provider' => 'required',
        'frequency' => 'required',
        'date' => 'required',
        'amount' => 'required|numeric'
        ])->validate();

        // if ($validated->fails()) {
        //     dd($validated->errors());
        //     // return $this->validationResponse($validated->errors());
        // }
        // dd(Carbon::parse($request->date)->add('1 month')->toDate());
        DB::table('maintenance_schedule')->insert([
            'vehicle_id' => $vehicle,
            'status' => $request->status,
            'task' => $request->task,
            'provider' => $request->provider,
            'frequency' => $request->frequency,
            'date' => Carbon::parse($request->date)->toDateString(),
            'cost'=> $request->amount,
            'next_visit' => Carbon::parse($request->date)->add($request->frequency)->toDateString(),
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        return redirect(route('vehicle.maintenance_list',$vehicle))->with('success','Schedule added');
    }

    public function edit_maintenance($log_id){
        $log = DB::table('maintenance_schedule')->where('id',$log_id)->first();
        $tasks = DB::table('maintenance_tasks')->pluck('name')->toArray();


        return view('fleet.vehicles.maintenance.edit',compact('log','tasks'));
    }

    public function update_maintenance(Request $request,$log_id){
        $validated = Validator::make($request->all(), [
        'status' => 'required',
        'provider' => 'required',
        'frequency' => 'required',
        'date' => 'required',
        'amount' => 'required|numeric'
        ])->validate();

        DB::table('maintenance_schedule')->where('id',$log_id)->update([
            'status' => $request->status,
            'task' => $request->task,
            'provider' => $request->provider,
            'frequency' => $request->frequency,
            'date' => Carbon::parse($request->date)->toDateString(),
            'cost'=> $request->amount,
            'next_visit' => Carbon::parse($request->date)->add($request->frequency)->toDateString(),
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        return redirect(route('vehicle.maintenance_list',$request->mask))->with('success','Schedule added');
    }

    public function delete_maintenance($log){
        DB::table('maintenance_schedule')->where('id',$log)->delete();

        return back()->with('success',"Schedule deleted");
    }

    public function all_schedules(){
        // $veh = DB::table('vehicles')->where("mask",$vehicle)->first();
        $logs = DB::table('maintenance_schedule')
        ->join('vehicles','vehicles.mask','maintenance_schedule.vehicle_id')
        ->select('maintenance_schedule.*','vehicles.number')
        ->get();

        return view('fleet.maintenance',compact('logs'));
    }
}
