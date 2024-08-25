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

    public $general = true;
    public $routes = false;



    public function mount(Request $request)
    {
        $this->loads = $request->loads;
        // dd($this->loads);
        $assigned_veh_drivers = DB::table('vehicles')->where('organization_id', $request->organization_id)->whereNotNull('driver_id')->pluck('driver_id')->toArray();

        $this->drivers = (object)DB::table('drivers')->where('organization_id', $request->organization_id)->whereIn('mask', $assigned_veh_drivers)->get(['name', 'phone', 'mask']);
        $this->organization = (array)DB::table('organizations')->where('mask', $request->organization_id)->first(['mask', 'name']);
    }

    public function check()
    {
        $this->count += 1;
        return $this->pickup_address;
    }

    public function getOrgs()
    {
        $supp_organizations  = DB::table('organizations')->get(['name', 'mask', 'load_type']);
        $loadtypes = DB::table('loads')->whereIn('mask',$this->loads)->pluck('load_type')->toArray();
        $organizations = [];
        foreach ($supp_organizations as $preferred) {
            $org_loads = json_decode($preferred->load_type);
            if ($org_loads != null) {
                $shipment_loads_supported = 0;
                $shipment_loads_unsupported = 0;

                foreach ($loadtypes as $load) {
                    if (in_array($load, $org_loads)) {
                        $shipment_loads_supported += 1;
                    } else {
                        $shipment_loads_unsupported += 1;
                    }
                }

                if (count($this->loads) == $shipment_loads_supported) {
                    array_push($organizations, $preferred);
                }
            }
            // dd($org_loads);

        }

        return $organizations;
    }

    public function updated()
    {
        $this->search_pickup = $this->pickupSearch($this->search_pickup);
        $this->search_dropoff = $this->dropoffSearch($this->search_dropoff);
    }


    public function getDrivers() {}


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

        $this->drivers = (object)DB::table('drivers')->where('organization_id', $request->organization_id)->whereIn('mask', $assigned_veh_drivers)->get(['name', 'phone', 'mask']);

        return view('shipments.create-shipment')->extends(whichUser()->getTable() == "brokers" ? 'layout.roles.broker' : 'layout.roles.organization')->section('content');
    }
}
