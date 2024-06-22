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

class EditShipment extends Component
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
    public $mask;
    public $shipment;

    public function mount($mask)
    {
        $shipment = DB::table('shipments')->where('mask', $mask)->first();
        $this->description = $shipment->description;
        $this->organization = $shipment->organization_id;
        $this->search_pickup = json_decode($shipment->pickup_address)->name;
        $this->search_dropoff = json_decode($shipment->dropoff_address)->name;


        if ($shipment->loads != null) {
            foreach (json_decode($shipment->loads) as $load) {
                $tmpload = (array)DB::table('loads')->where('mask', $load)->first();
                array_push($this->loadsDets, $tmpload);
            }
        }

        // $this->loads = json_decode($shipment->loads);
        // $this->organization = $shipment->organization_id;
        // $this->drivers = (object)DB::table('drivers')->where('organization_id', $shipment->organization_id)->get(['name', 'phone', 'mask']);
    }

    public function check()
    {
        $this->count += 1;
        return $this->pickup_address;
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
       return DB::table('drivers')->where('organization_id', $this->organization)->get(['name', 'phone', 'mask']);

    }

    public function dropoffSearch($field)
    {
        $this->dropoff_list = lookupLocation($field);
        return $field;
    }

    public function edit_shipment()
    {
        dd($this->pickup_address);
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


        DB::table('shipments')->where('mask',$this->mask)->update([
            'organization_id' => $this->organization,
            'driver_id' => $this->driver_id,
            'broker_id' => whichUser()->mask,
            'loads' => json_encode($this->loads),
            'description' => $this->description,
            'pickup_address' => json_encode(getPlaceCoordinates($this->pickup_address)),
            'dropoff_address' => json_encode(getPlaceCoordinates($this->dropoff_address)),
            'approval_status' => "Approved",
            'shipment_status' => "Assigned",
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        return redirect(route('load.board'));
    }

    public function render()
    {
        return view('brokers.shipments.edit-shipment')->extends('layout.roles.broker')->section('content');
    }
}
