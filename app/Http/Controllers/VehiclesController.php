<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VehiclesController extends Controller
{
    //

    public function index()
    {
        $vehicles = DB::table('vehicles')->where("organization_id", Auth::user()->mask)
            ->select('vehicles.make', 'vehicles.model', 'vehicles.engine_type', 'vehicles.gps', 'vehicles.driver_id', 'vehicles.gps', 'vehicles.mask', 'vehicles.number', 'vehicles.owner_id')
            ->get();

        foreach ($vehicles as $vehicle) {
            if ($vehicle->driver_id) {
                $driver = DB::table('drivers')->where('mask', $vehicle->driver_id)->pluck('name')->first();
                $vehicle->driver = $driver;
            } else {
                $vehicle->driver = null;
            }
            if ($vehicle->owner_id) {
                $owner = DB::table('vehicle_owners')->where('id', $vehicle->owner_id)->pluck('name')->first();
                $vehicle->owner = $owner;
            } else {
                $vehicle->owner = null;
            }
        }
        return view('fleet.vehicles.vehicles', compact('vehicles'));
    }

    public function delete($vehicle)
    {
        $veh = DB::table('vehicles')->where('mask', $vehicle)->first();
        if ($veh->image) {
            unlink('storage/vehicles/' . $veh->image);
        }

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
        $vehicle =  DB::table('vehicles')->where('mask', $mask)
            ->join("vehicle_categories", 'vehicle_categories.id', 'vehicles.vehicle_category_id')
            ->join("vehicle_sub_categories", 'vehicle_sub_categories.id', 'vehicles.vehicle_subcategory_id')
            ->select('vehicles.*', 'vehicle_categories.name as category', 'vehicle_sub_categories.name as subcategory')
            ->first();
        $vehicle_routes = DB::table('vehicle_routes')->where('vehicle_id', $mask)->get();
        $vehicle_owner = $vehicle->organization_id ? DB::table('organizations')->where("mask", $vehicle->organization_id)->first() : DB::table('vehicle_owners')->where('vehicle_id', $mask)->first();

        $organization = null;
        $driver = DB::table('drivers')->where('mask', $vehicle->driver_id)->first();

        return view('fleet.vehicles.details', compact('vehicle', "vehicle_routes", 'vehicle_owner', 'organization', 'driver'));
    }

    public function maintenance_logs($vehicle)
    {
        $veh = DB::table('vehicles')->where("mask", $vehicle)->first();
        $logs = DB::table('maintenance_schedule')->where("vehicle_id", $vehicle)->get();

        return view('fleet.vehicles.maintenance.view', compact('vehicle', 'veh', 'logs'));
    }

    public function add_maintenance($vehicle)
    {
        $tasks = DB::table('maintenance_tasks')->pluck('name')->toArray();
        $providers = DB::table('maintenance_providers')->get(['id', 'name']);

        return view('fleet.vehicles.maintenance.add', compact('vehicle', 'tasks', 'providers'));
    }

    public function store_maintenance(Request $request, $vehicle)
    {
        $validated = Validator::make($request->all(), [
            'status' => 'required',
            'provider' => 'required',
            'frequency' => 'required',
            'date' => 'required',
            'amount' => 'required|numeric'
        ])->validate();

        $date = Carbon::parse($request->date)->toDateString();


        DB::table('maintenance_schedule')->insert([
            'vehicle_id' => $vehicle,
            'status' => $request->status,
            'task' => $request->task,
            'provider' => $request->provider,
            'frequency' => $request->frequency,
            'date' => $date,
            'cost' => $request->amount,
            'next_visit' => Carbon::parse($request->date)->add($request->frequency)->toDateString(),
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        $veh = DB::table('vehicles')->where('mask', $vehicle)->first();

        if ($veh->driver_id) {
            $driver = DB::table('drivers')->where('mask', $veh->driver_id)->first();
            $msg = "Your vehicle has been assigned for maintenance on " . $date;
            sendMail("Maintenance Schedule", $driver->email, $msg);
        }

        return redirect(route(auth()->guard()->name == 'drivers' ? 'driver.vehicle.maintenance' : 'vehicle.maintenance_list', $vehicle))->with('success', 'Schedule added');
    }

    public function edit_maintenance($log_id)
    {
        $log = DB::table('maintenance_schedule')->where('id', $log_id)->first();
        $tasks = DB::table('maintenance_tasks')->pluck('name')->toArray();
        $providers = DB::table('maintenance_providers')->get(['id', 'name']);

        return view('fleet.vehicles.maintenance.edit', compact('log', 'tasks', 'providers'));
    }

    public function update_maintenance(Request $request, $log_id)
    {
        $validated = Validator::make($request->all(), [
            'status' => 'required',
            'provider' => 'required',
            'frequency' => 'required',
            'date' => 'required',
            'amount' => 'required|numeric'
        ])->validate();

        DB::table('maintenance_schedule')->where('id', $log_id)->update([
            'status' => $request->status,
            'task' => $request->task,
            'provider' => $request->provider,
            'frequency' => $request->frequency,
            'date' => Carbon::parse($request->date)->toDateString(),
            'cost' => $request->amount,
            'next_visit' => Carbon::parse($request->date)->add($request->frequency)->toDateString(),
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        return redirect(route(auth()->guard()->name == 'drivers' ? 'driver.vehicle.maintenance' : 'vehicle.maintenance_list', $request->vehicle_id))->with('success', 'Schedule added');
    }

    public function delete_maintenance($log)
    {
        DB::table('maintenance_schedule')->where('id', $log)->delete();

        return back()->with('success', "Schedule deleted");
    }

    public function all_schedules()
    {
        $veh = DB::table('vehicles')->where('organization_id', Auth::user()->mask)->pluck('mask')->toArray();
        $logs = DB::table('maintenance_schedule')->whereIn('vehicle_id', $veh)
            ->join('vehicles', 'vehicles.mask', 'maintenance_schedule.vehicle_id')
            ->select('maintenance_schedule.*', 'vehicles.number')
            ->get();

        return view('fleet.maintenance', compact('logs'));
    }

    public function driver_vehicle_maintenance()
    {
        $veh = DB::table('vehicles')->where('driver_id', whichUser()->mask)->first();

        $logs = DB::table('maintenance_schedule')->where("vehicle_id", $veh->mask)->get();

        $vehicle = $veh->mask;

        return view('fleet.vehicles.maintenance.view', compact('vehicle', 'veh', 'logs'));
    }

    public function locate($mask)
    {
        $vehicle = DB::table('vehicles')->where('mask', $mask)
            ->join('vehicle_categories', 'vehicle_categories.id', 'vehicles.vehicle_category_id')
            ->join('vehicle_sub_categories', 'vehicle_sub_categories.id', 'vehicles.vehicle_subcategory_id')
            ->select('vehicle_categories.name as category', 'vehicle_sub_categories.name as subcategory', 'vehicles.*')
            ->first();
        $org = DB::table('organizations')->where('mask', $vehicle->organization_id)->first();
        $driver = DB::table('drivers')->where("mask", $vehicle->driver_id)->first();

        return view('fleet.vehicles.locate', compact('vehicle', 'org', 'driver'));
    }
}
