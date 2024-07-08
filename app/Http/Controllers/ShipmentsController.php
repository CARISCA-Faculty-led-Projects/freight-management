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
        $shipments = DB::table('shipments')->where('organization_id', whichUser()->mask)->get();

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

        DB::table('loads')->whereIn('mask',$loads)->update(['shipment_status'=> 'Unassigned']);

        DB::table('shipments')->where('mask', $mask)->delete();

        return back()->with('success', "Shipment deleted Successfully");
    }

    public function create(Request $request)
    {
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


        DB::table('shipments')->insert([
            'organization_id' => $request->organization_id,
            'driver_id' => $request->driver_id,
            'broker_id' => whichUser()->mask,
            'loads' => json_encode($request->loads),
            'description' => $request->description,
            'mask' => generateNumber(),
            'pickup_address' => $request->pickup_address == null ? '': json_encode(getPlaceCoordinates($request->pickup_address)),
            'dropoff_address' => $request->dropoff_address == null ? '': json_encode(getPlaceCoordinates($request->dropoff_address)),
            'approval_status' => "Approved",
            'shipment_status' => "Assigned",
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        DB::table('loads')->whereIn('mask', $request->loads)->update(['shipment_status' => "Assigned"]);

        return redirect(route(whichUser()->getTable() == 'brokers' ? 'load.board' : 'org.shipments.list'));
    }

    public function update(Request $request, $shipment)
    {
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

        $req = [];
        $req['driver_id'] = $request->driver_id;
        $req['loads'] = json_encode($request->loads);
        $req['description'] = $request->description;
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
                DB::table('loads')->where('mask', $load)->update(['shipment_status' => "Unassigned"]);
            }
        }

        DB::table('shipments')->where('mask', $shipment)->update($req);

        return redirect(route(whichUser()->getTable() == 'brokers' ? 'load.board' : 'org.shipments.list'));
    }

    public function curr_location(Request $request){
        $location = ['lat'=> $request->lat,'lng'=>$request->lng];

        broadcast(new SendLocation('org','shipment', $location))->toOthers();

        return $this->successResponse('Location sent',$location);
    }

    public function getShipmentCoordinates(){
        $shipments = DB::table('shipments')->where('organization_id',whichUser()->mask)->where('shipment_status','On route')->pluck('last_location')->toArray();

        return $this->successResponse('',$shipments);
    }
}
