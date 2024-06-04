<?php

namespace App\Http\Livewire\Broker;

use Carbon\Carbon;
use App\Models\Load;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\DumpHandler;

class CreateShipment extends Component
{
    public $loads = [];
    public $loadsDets = [];
    public $drivers = [];
    public $driver_id;
    public $count = 0;
    public $pickup_address;
    public $dropoff_address;
    public $pickup_list = [];
    public $dropoff_list = [];
    public $search_pickup;
    public $search_dropoff;
    public $organization;

    public function mount(Request $request)
    {
        // dd($request->all());

        $this->loads = $request->loads;
        $this->organization = $request->organization_id;
        $this->drivers = (object)DB::table('drivers')->where('organization_id', $request->organization_id)->get(['name', 'phone', 'mask']);

    }

    public function check()
    {
        $this->count += 1;
        return $this->pickup_address;
    }

    public function updated(){
        $this->search_pickup = $this->pickupSearch($this->search_pickup);
        $this->search_dropoff = $this->dropoffSearch($this->search_dropoff);
    }

    public function pickupSearch($field){
        $this->pickup_list = lookupLocation($field);
        return $field;
    }

    public function dropoffSearch($field){
        $this->dropoff_list = lookupLocation($field);
        return $field;
    }

    public function create_shipment(){
        // dd($this->pickup_address);

        DB::table('shipments')->insert([
            'organization_id' => $this->organization,
            'driver_id' => $this->driver_id,
            'loads' => json_encode($this->loads),
            'description' => "this->description",
            'mask'=>Str::orderedUuid(),
            'pickup_address' => json_encode(getPlaceCoordinates($this->pickup_address)),
            'dropoff_address' => json_encode(getPlaceCoordinates($this->dropoff_address)),
            'approval_status' => "Approved",
            'shipment_status' => "Assigned",
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        return redirect(route('load.board'));
    }

    public function render(Request $request)
    {
        if($this->loads != null){
            foreach ($this->loads as $load) {
                $tmpload = (array)DB::table('loads')->where('mask', $load)->first();
                array_push($this->loadsDets, $tmpload);
            }
        }
        // dd($drivers);

        return view('brokers.shipments.create-shipment')->extends('layout.roles.broker')->section('content');
    }
}
