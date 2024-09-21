<?php

namespace App\Http\Controllers;

use App\Events\SendLocation;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ShipmentsController extends Controller
{
    use ResponseTrait;
    public function schedule()
    {
        return view('shipments.schedule');
    }

    public function list()
    {
        $shipments = DB::table('shipments')->where('organization_id', whichUser()->mask)->orderByDesc('created_at')->get();

        foreach ($shipments as $shipment) {
            if ($shipment->driver_id != null) {
                $driver = DB::table('drivers')->where('mask', $shipment->driver_id)->first();
                $shipment->driver = $driver->name;
            } else {
                $shipment->driver = '';
            }
        }

        return view('shipments.list', compact('shipments'));
    }

    public function all_shipments()
    {
        $shipments = DB::table('shipments')->where('broker_id', whichUser()->mask)
            ->join('organizations', 'organizations.mask', 'shipments.organization_id')
            ->select('shipments.*', 'organizations.name as organization')
            ->orderByDesc('created_at')
            ->get();

        foreach ($shipments as $shipment) {
            if ($shipment->driver_id != null) {
                $driver = DB::table('drivers')->where('mask', $shipment->driver_id)->first();
                $shipment->driver = $driver->name;
            } else {
                $shipment->driver = '';
            }
        }
        return view('brokers.shipments.list', compact('shipments'));
    }

    public function schedule_shipment(Request $request)
    {
        DB::table('shipments')->where('mask', $request->mask)->update(['pickup_date' => $request->start_date]);
        return back()->with("Shipments start time set successfully ");
    }

    public function add()
    {

        $loads = DB::table('loads')->get();
        $load_types = DB::table('load_types')->get();

        $senders = DB::table('senders')->get(['name', 'phone', 'mask']);
        $drivers = DB::table('drivers')->where('organization_id', whichUser()->mask)->get(['name', 'phone', 'mask']);

        return view('shipments.add', compact('loads', 'load_types', 'senders', 'drivers'));
    }

    // public function create(Request $request)
    // {
    //     $loads = [];

    //     foreach ($request->loads as $load) {
    //         $tmpload = DB::table('loads')->where('mask', $load)->first();
    //         array_push($loads, $tmpload);
    //     }

    //     $drivers = DB::table('drivers')->where('organization_id', whichUser()->mask)->get(['name', 'phone', 'mask']);

    //     return view('brokers.create-shipment', compact('loads', 'drivers'));
    // }

    public function store(Request $request)
    {
        Validator::make($request->all(), ['sender_id' => 'required', 'load_type' => 'required', 'driver_id' => 'required', 'amount' => 'required'])->validate();

        $request['created_at'] = Carbon::now()->toDateTimeString();
        $request['mask'] = generateNumber();
        $request['organisation_id'] = whichUser()->mask;

        $request['loads'] = json_encode($request->loads);
        // dd($request->all());
        DB::table('shipments')->insert($request->except(['_token', 'condition_label', 'conditions', 'condition_equals', 'condition_type']));

        return redirect(route('shipments.list'))->with('success', 'Shipments details saved');
    }

    public function start_delivery($shipment)
    {
        DB::table('shipments')->where('mask', $shipment)->update(['shipment_status' => 'On route']);
        // notify senders with load in shipment
        return back()->with('success', 'Shipment delivery started');
    }

    public function end_delivery($shipment)
    {
        DB::table('shipments')->where('mask', $shipment)->update(['shipment_status' => 'Delivered']);
        // notify senders with load in shipment
        return back()->with('success', 'Shipment delivery started');
    }

    public function cancel_delivery($shipment)
    {
        DB::table('shipments')->where('mask', $shipment)->update(['shipment_status' => 'Cancelled']);
        // notify senders with load in shipment
        return back()->with('success', 'Shipment delivery cancelled');
    }

    public function shipment_loads($shipment_id)
    {
        $shipment = DB::table('shipments')->where('mask', $shipment_id)->first();

        $shipment_loads = json_decode($shipment->loads);
        $loads = [];

        foreach ($shipment_loads as $load) {
            $load = DB::table('loads')->where('mask', $load)->first();
            array_push($loads, $load);
        }

        return view('fleet.drivers.shipment_loads', compact('loads', 'shipment_id'));
    }

    public function delete($mask)
    {
        $shipment = DB::table('shipments')->where('mask', $mask)->first(['loads']);

        $loads = json_decode($shipment->loads);

        DB::table('loads')->whereIn('mask', $loads)->update(['shipment_status' => 'Unassigned']);

        DB::table('shipments')->where('mask', $mask)->delete();

        return back()->with('success', "Shipment deleted Successfully");
    }

    public function create(Request $request)
    {
        // dd($request->all());
        if ($request->no_driver == "true") {
            // Validator::make([$this->pickup_address, $this->dropoff_address], [
            //     'pickup_address' => 'required',
            //     'dropoff_address' => 'required',
            // ], [
            //     'pickup_address' => "Search and select a pickup address for the shipment",
            //     'dropoff_address' => "Search and select a dropoff address for the shipment"
            // ])->validate();

        } else {
            Validator::make($request->all(), [
                'driver_id' => 'required',
                // 'pickup_address' => 'required',
                // 'dropoff_address' => 'required',
            ], [
                'driver_id' => "The driver is required",
                // 'pickup_address' => "Search and select a pickup address for the shipment",
                // 'dropoff_address' => "Search and select a dropoff address for the shipment"
            ])->validate();
        }
        $activity = [];
        $startingAddr = json_decode($request->starting_addr, true);
        $destinationAddr = json_decode($request->destination_addr, true);
        $route = json_decode($request->route, true);
        $locations = json_decode($request->locations, true);

        // Find the starting address in the locations array
        foreach ($locations as $location) {
            if ($location['position']['lat'] == $startingAddr['lat'] && $location['position']['lng'] == $startingAddr['lng']) {
                array_push($activity, $location);
                break;
            }
        }

        // Loop through route and order locations variable
        foreach ($route as $routePoint) {
            foreach ($locations as $location) {
                if ($routePoint['lat'] == $location['position']['lat'] && $routePoint['lng'] == $location['position']['lng']) {
                    array_push($activity, $location);
                    break;
                }
            }
        }

        // Find the destination address in the locations array
        foreach ($locations as $location) {
            if ($location['position']['lat'] == $destinationAddr['lat'] && $location['position']['lng'] == $destinationAddr['lng']) {
                array_push($activity, $location);
                break;
            }
        }

        // dd($activity);


        // dd('catch');
        $mask = generateNumber();

        DB::table('shipments')->insert([
            'organization_id' => $request->organization_id,
            'driver_id' => $request->driver_id,
            'broker_id' => whichUser()->mask,
            'loads' => json_encode($request->loads),
            'description' => $request->description,
            'mask' => $mask,
            'pickup_address' => $request->starting_addr,
            'dropoff_address' => $request->destination_addr,
            'starting_point' => $request->starting_point,
            'destination' => $request->destination,
            'approval_status' => "Approved",
            'shipment_status' => "Assigned",
            'route' => $request->route,
            'route_activity' => json_encode($activity),
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        $driver = DB::table('drivers')->where('mask', $request->driver_id);
        // $msg = "Hello {$driver->first()->name}, You have been assigned a shipment";
        // sendMail("SHIPMENT ASSIGNMENT",$driver->first()->email,$msg);
        $driver->update(['shipment_status' => "Assigned"]);
        DB::table('loads')->whereIn('mask', $request->loads)->update(['shipment_status' => "Assigned", 'shipment_id' => $mask,'organization_id'=>$request->organization_id]);
        // return redirect(route('broker.shipment.assign_driver', $mask));
        return redirect(route(whichUser()->getTable() == 'brokers' ? 'broker.shipments.list' : 'org.shipments.list'));
    }

    public function update(Request $request, $shipment)
    {
        // dd($request->all());
        if ($request->no_driver == "true") {
            // Validator::make([$this->pickup_address, $this->dropoff_address], [
            //     'pickup_address' => 'required',
            //     'dropoff_address' => 'required',
            // ], [
            //     'pickup_address' => "Search and select a pickup address for the shipment",
            //     'dropoff_address' => "Search and select a dropoff address for the shipment"
            // ])->validate();

        } else {
            Validator::make($request->all(), [
                'driver_id' => 'required',
                // 'pickup_address' => 'required',
                // 'dropoff_address' => 'required',
            ], [
                'driver_id' => "The driver is required",
                // 'pickup_address' => "Search and select a pickup address for the shipment",
                // 'dropoff_address' => "Search and select a dropoff address for the shipment"
            ])->validate();
        }

        $activity = [];
        if ($request->pickup_address != null && $request->dropoff_address != null) {
            $startingAddr = json_decode($request->starting_addr, true);
            $destinationAddr = json_decode($request->destination_addr, true);
            $route = json_decode($request->route, true);
            $locations = json_decode($request->locations, true);

            // Find the starting address in the locations array
            foreach ($locations as $location) {
                if ($location['position']['lat'] == $startingAddr['lat'] && $location['position']['lng'] == $startingAddr['lng']) {
                    array_push($activity, $location);
                    break;
                }
            }

            // Loop through route and order locations variable
            foreach ($route as $routePoint) {
                foreach ($locations as $location) {
                    if ($routePoint['lat'] == $location['position']['lat'] && $routePoint['lng'] == $location['position']['lng']) {
                        array_push($activity, $location);
                        break;
                    }
                }
            }

            // Find the destination address in the locations array
            foreach ($locations as $location) {
                if ($location['position']['lat'] == $destinationAddr['lat'] && $location['position']['lng'] == $destinationAddr['lng']) {
                    array_push($activity, $location);
                    break;
                }
            }
        }

        $req = [];
        $req['driver_id'] = $request->driver_id;
        // $req['organization_id'] = $request->organization_id;
        $req['loads'] = json_encode($request->loads);
        $req['description'] = $request->description;
        $req['starting_point'] = $request->starting_point;
        $req['destination'] = $request->destination;
        $req['shipment_status'] = $request->driver_id ? "Assigned" : null;
        $req['route'] = $request->route;
        if ($activity != []) {
            $req['route_activity'] = json_encode($activity);
        }

        $req['updated_at'] = Carbon::now()->toDateTimeString();

        if ($request->pickup_address != '' && gettype(json_decode($request->pickup_address)) == "NULL") {
            $req['pickup_address'] = json_encode(getPlaceCoordinates($request->pickup_address));
        }

        if ($request->dropoff_address != '' && gettype(json_decode($request->dropoff_address)) == "NULL") {
            $req['dropoff_address'] = json_encode(getPlaceCoordinates($request->dropoff_address));
        }

        // Get old loads
        $old_loads = DB::table('shipments')->where('mask', $shipment)->first(['loads']);
        // Check old loads if a load has been taken out
        foreach (json_decode($old_loads->loads) as $load) {
            if (!in_array($load, $request->loads)) {
                DB::table('loads')->where('mask', $load)->update(['shipment_status' => "Unassigned", "shipment_id" => null]);
            }
        }

        $driver = DB::table('drivers')->where('mask', $request->driver_id);
        // $msg = "Hello {$driver->first()->name}, You have been assigned a shipment";
        // sendMail("SHIPMENT ASSIGNMENT",$driver->first()->email,$msg);
        $driver->update(['shipment_status' => "Assigned"]);

        DB::table('shipments')->where('mask', $shipment)->update($req);

        return redirect(route(whichUser()->getTable() == 'brokers' ? 'load.board' : 'org.shipments.list'));
    }

    public function curr_location(Request $request)
    {
        $location = ['lat' => $request->lat, 'lng' => $request->lng];

        broadcast(new SendLocation('org', 'shipment', $location))->toOthers();

        return $this->successResponse('Location sent', $location);
    }

    public function getShipmentCoordinates()
    {
        $shipments = DB::table('shipments')->where('organization_id', whichUser()->mask)->where('shipment_status', 'On route')->pluck('last_location')->toArray();

        return $this->successResponse('', $shipments);
    }

    public function getShipmentSupportedDrivers(Request $request)
    {

        $supp_vehicles  = DB::table('vehicles')->where('organization_id', $request->organization)->get(['number as name', 'driver_id', 'mask', 'load_type']);

        $loads = DB::table('loads')->whereIn('mask', $request->loads)->pluck('load_type')->toArray();

        $supported = [];
        $supp_organizations  = DB::table('organizations')->get(['name', 'mask', 'load_type']);

        foreach ($supp_vehicles as $preferred) {
            $veh_loads = json_decode($preferred->load_type);
            if ($veh_loads != null) {
                $shipment_loads_supported = 0;
                $shipment_loads_unsupported = 0;
                foreach ($loads as $load) {
                    // dd(gettype($org_loads));
                    if (in_array($load, $veh_loads)) {
                        $shipment_loads_supported += 1;
                    } else {
                        $shipment_loads_unsupported += 1;
                    }
                }

                if (count($loads) == $shipment_loads_supported) {
                    array_push($supported, $preferred->driver_id);
                }
            }
        }
        $drivers = DB::table('drivers')->whereIn('mask', $supported)->get(['name', 'mask']);
        return $drivers;
    }
}
