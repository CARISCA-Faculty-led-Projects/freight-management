<?php

namespace App\Http\Livewire\Broker;

use Carbon\Carbon;
use App\Models\Load;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\DumpHandler;

class CreateShipment extends Component
{
    public $loads = [];
    public $loadsDets = [];
    public $drivers;
    public $driver_id;
    public $description;
    public $count = 0;
    public $pickup_address;
    public $dropoff_address;
    public $pickup_list = [];
    public $dropoff_list = [];
    public $search_pickup;
    public $search_dropoff;
    public $organization;
    public $no_driver;

    public function mount(Request $request)
    {
        $this->loads = $request->loads;
        
        $assigned_veh_drivers = DB::table('vehicles')->where('organization_id', $request->organization_id)->whereNotNull('driver_id')->pluck('driver_id')->toArray();

        $this->drivers = (object)DB::table('drivers')->where('organization_id', $request->organization_id)->whereIn('mask',$assigned_veh_drivers)->get(['name', 'phone', 'mask']);
        $this->organization = (array)DB::table('organizations')->where('mask',$request->organization_id)->first(['mask','name']);

    }

    public function check()
    {
        $this->count += 1;
        return $this->pickup_address;
    }

    public function getOrgs()
    {
       return DB::table('organizations')->get(['name','mask']);

    }

    public function updated()
    {
        $this->search_pickup = $this->pickupSearch($this->search_pickup);
        $this->search_dropoff = $this->dropoffSearch($this->search_dropoff);
    }

    public function pickupSearch($field)
    {
        $this->pickup_list = lookupLocation($field);
        return $field;
    }

    public function getDrivers()
    {
    }

    public function dropoffSearch($field)
    {
        $this->dropoff_list = lookupLocation($field);
        return $field;
    }

    public function create_shipment()
    {
        if ($this->no_driver == "true") {
            // Validator::make([$this->pickup_address, $this->dropoff_address], [
            //     'pickup_address' => 'required',
            //     'dropoff_address' => 'required',
            // ], [
            //     'pickup_address' => "Search and select a pickup address for the shipment",
            //     'dropoff_address' => "Search and select a dropoff address for the shipment"
            // ])->validate();

        } else {
            Validator::make([$this->pickup_address, $this->dropoff_address, $this->driver_id], [
                'driver_id' => 'required',
                'pickup_address' => 'required',
                'dropoff_address' => 'required',
            ], [
                'driver_id' => "The driver is required",
                'pickup_address' => "Search and select a pickup address for the shipment",
                'dropoff_address' => "Search and select a dropoff address for the shipment"
            ])->validate();
        }


        DB::table('shipments')->insert([
            'organization_id' => $this->organization['mask'],
            'driver_id' => $this->driver_id,
            'broker_id' => whichUser()->mask,
            'loads' => json_encode($this->loads),
            'description' => $this->description,
            'mask' => generateNumber(),
            'pickup_address' => json_encode(getPlaceCoordinates($this->pickup_address)),
            'dropoff_address' => json_encode(getPlaceCoordinates($this->dropoff_address)),
            'approval_status' => "Approved",
            'shipment_status' => "Assigned",
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        return redirect(route(whichUser()->getTable() == 'brokers' ? 'load.board' : 'org.shipments.list'));
    }

    public function render(Request $request)
    {
        $this->loadsDets = [];
        if ($this->loads != null) {
            foreach ($this->loads as $load) {
                $tmpload = (array)DB::table('loads')->where('mask', $load)->first();
                array_push($this->loadsDets, $tmpload);
            }
        }

        $assigned_veh_drivers = DB::table('vehicles')->where('organization_id', $request->organization_id)->whereNotNull('driver_id')->pluck('driver_id')->toArray();

        $this->drivers = (object)DB::table('drivers')->where('organization_id', $request->organization_id)->whereIn('mask',$assigned_veh_drivers)->get(['name', 'phone', 'mask']);

        return view('shipments.create-shipment')->extends(whichUser()->getTable() == "brokers" ? 'layout.roles.broker' : 'layout.roles.organization')->section('content');
    }
}
