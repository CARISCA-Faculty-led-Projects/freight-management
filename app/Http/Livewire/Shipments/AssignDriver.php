<?php

namespace App\Http\Livewire\Shipments;

use App\Http\Livewire\Organisation;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AssignDriver extends Component
{

    public $shipment;
    public $supported = [];
    public $unsupported = [];
    public $organizations = [];
    public $drivers;
    public $vehicles;
    public $organization_id;
    public $driver_id;

    public function mount($shipment_id)
    {
        $shipment = DB::table('shipments')->where("mask", $shipment_id)->first();
        $ship_loads = json_decode($shipment->loads);
        $loads = DB::table('loads')->whereIn('mask', $ship_loads)->pluck('load_type')->toArray();
        $sorted_shipment_load = sort($loads);
        $this->shipment = $shipment_id;

        $supported_orgs = [];
        // $array1 = ['3', 'a', 'b'];
        // $array2 = ['a', 'b', '3'];

        // sort($array1);
        // sort($array2);

        // $array1 == $array2  //true
        // $array1 === $array2 //true

        $supp_organizations  = DB::table('organizations')->get(['name', 'mask', 'load_type']);

        foreach ($supp_organizations as $preferred) {
            $org_loads = json_decode($preferred->load_type);
            if ($org_loads != null) {
                $shipment_loads_supported = 0;
                $shipment_loads_unsupported = 0;
                foreach ($loads as $load) {
                    // dd(gettype($org_loads));
                    if (in_array($load, $org_loads)) {
                        $shipment_loads_supported += 1;
                    } else {
                        $shipment_loads_unsupported += 1;
                    }
                }

                if (count($loads) == $shipment_loads_supported) {
                    array_push($this->organizations, $preferred);
                }
            }
            // dd($org_loads);

        }
        // dd($loads);

        $vehicles = DB::table('vehicles')->whereNotNull("driver_id")->get();



        // $vehicle = DB::table('vehicles')->where("driver_id", $shipment->driver_id)->first(['organization_id', 'load_type']);
        // $vehicle_loads = json_decode($vehicle->load_type);

        // $this->organization  = (array)DB::table('organizations')->where('mask', $vehicle->organization_id)->first();
        // $loads = DB::table('loads')->whereIn('mask', $ship_loads)->pluck('load_type')->toArray();
        // $supported = [];
        // $unsupported = [];
        // foreach ($loads as $load) {
        //     if (in_array($load, $vehicle_loads)) {
        //         // $upported += 1;
        //         array_push($supported, $load);
        //     } else {
        //         array_push($unsupported, $load);
        //     }
        // }

        // $this->supported = DB::table('loads')->whereIn('mask', $supported)->get();
        // $this->unsupported = DB::table('loads')->whereIn('mask', $unsupported)->get();
    }

    public function kmount($shipment_id)
    {
        $shipment = DB::table('shipments')->where("mask", $shipment_id)->first();
        $ship_loads = json_decode($shipment->loads);

        $vehicle = DB::table('vehicles')->where("driver_id", $shipment->driver_id)->first(['organization_id', 'load_type']);
        $vehicle_loads = json_decode($vehicle->load_type);
        $this->vehicles = DB::table('vehicles')->where("organization_id", $vehicle->organization_id)->get();

        $this->organization  = (array)DB::table('organizations')->where('mask', $vehicle->organization_id)->first();
        $loads = DB::table('loads')->whereIn('mask', $ship_loads)->pluck('load_type')->toArray();
        $supported = [];
        $unsupported = [];
        foreach ($loads as $load) {
            if (in_array($load, $vehicle_loads)) {
                // $upported += 1;
                array_push($supported, $load);
            } else {
                array_push($unsupported, $load);
            }
        }

        $this->supported = DB::table('loads')->whereIn('mask', $supported)->get();
        $this->unsupported = DB::table('loads')->whereIn('mask', $unsupported)->get();
    }

    public function getOrgs()
    {
        return $this->organizations;
    }

    public function getDrivers($org)
    {
        if ($org) {
            dd($org);

        } else {
            return [];
        }
    }

    public function updated() {}

    public function render()
    {
        return view('shipments.assign-driver')->extends(whichUser()->getTable() == "brokers" ? 'layout.roles.broker' : 'layout.roles.organization')->section('content');;
    }
}
