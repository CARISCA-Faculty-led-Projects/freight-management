<?php

namespace App\Http\Livewire\Vehicle;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;

class AddVehicle extends Component
{
    use WithFileUploads;

    // Tabs
    public $general = true;
    public $others = false;
    public $doc_page = false;

    // public $org_list;
    // public $vehicle_categories_list;
    // public $vehicle_subcategories_list;
    // public $load_types;

    // Fields
    public $organization_id;
    public $driver_id;
    public $image;
    public $load_type = [];
    public $vehicle_category_id;
    public $vehicle_subcategory_id;
    public $make;
    public $model;
    public $year;
    public $color;
    public $gps;
    public $engine_type;
    public $transmission;
    public $fuel_consumption;
    public $axle_type;
    public $weight;
    public $max_load_weight;
    public $width;
    public $height;
    public $length;
    public $owners_documents;
    public $road_worth_documents;
    public $insurance_documents;
    public $owner;
    public $owner_email;
    public $owner_phone;
    public $owner_address;
    public $org_owned;

    public $driver_details;

    public $vehicle_id;
    public $documents;
    // public $owner_name;
    // public $owner_email;
    // public $owner_phone;
    // public $owner_address;

    public $routes_counter = 1;
    public $veh_routes = [];

    public function addRoute()
    {
        $this->routes_counter++;
    }

    public function activate($tab)
    {
        if ($tab == 'general') {
            $this->general = true;
            $this->others = false;
            $this->doc_page = false;
        } else if ($tab == 'others') {
            $this->general = false;
            $this->others = true;
            $this->doc_page = false;
        } else if ($tab == 'documents') {
            $this->general = false;
            $this->others = false;
            $this->doc_page = true;
        }
    }

    public function general()
    {
        $imagename = uniqid() . '.' . $this->image->getClientOriginalExtension();
        $this->image->storeAs('vehicles', $imagename, 'real_public');

        $vehicle = DB::table('vehicles')->insertGetId([
            'image' => $imagename,
            'load_type' => json_encode($this->load_type),
            'vehicle_category_id' => $this->vehicle_category_id,
            'vehicle_subcategory_id' => $this->vehicle_subcategory_id,
            'make' => $this->make,
            'model' => $this->model,
            'year' => $this->year,
            'color' => $this->color,
            'gps' => $this->gps,
            'mask' => Str::orderedUuid(),
            'engine_type' => $this->engine_type,
            'transmission' => $this->transmission,
            'fuel_consumption' => $this->fuel_consumption,
            'axle_type' => $this->axle_type
        ]);

        $this->vehicle_id = $vehicle;

        $this->activate('others');
    }

    public function others()
    {
        $vehicleMask = DB::table('vehicles')->where('id', $this->vehicle_id)->pluck('mask')->first();
        $this->owner['vehicle_id'] = $vehicleMask;
        $owner = DB::table('vehicle_owners')->insertGetId($this->owner);

        DB::table('vehicles')->where('mask', $vehicleMask)->update(['owner_id' => $owner]);

        foreach ($this->veh_routes as $route) {
            DB::table('vehicle_routes')->insert([
                'vehicle_id' => $vehicleMask,
                'origin' => $route['origin'],
                'destination' => $route['dest'],
                'created_at' => Carbon::now()->toDateTimeString()
            ]);
        }

        $this->activate('documents');
    }

    public function documents()
    {
        $owners = uniqid() . '.' . $this->documents['owners_documents']->getClientOriginalExtension();
        $this->documents['owners_documents']->storeAs('vehicles', $owners, 'real_public');

        $roadworth = uniqid() . '.' . $this->documents['road_worth_documents']->getClientOriginalExtension();
        $this->documents['road_worth_documents']->storeAs('vehicles', $roadworth, 'real_public');

        $insurance = uniqid() . '.' . $this->documents['insurance']->getClientOriginalExtension();
        $this->documents['insurance']->storeAs('vehicles', $insurance, 'real_public');


        DB::table('vehicles')->where('mask',$this->owner['vehicle_id'])->update([
            'owners_documents' => $owners,
            'road_worth_documents' => $roadworth,
            'insurance_documents'=> $insurance,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        return redirect()->to('/fleet/vehicles');

    }


    #[Computed]
    public function olist()
    {
        return DB::table('organizations')->select('mask', 'name')->get();
    }
    #[Computed]
    public function vcat()
    {
        return DB::table('vehicle_categories')->get(['id', 'name']);
    }
    #[Computed]
    public function vsubcat()
    {
        return DB::table('vehicle_sub_categories')->get(['id', 'name']);
    }
    #[Computed]
    public function loads()
    {
        return DB::table('load_types')->get(['id', 'name']);
    }

    public function render()
    {
        return view('fleet.vehicles.add')->extends('layout.app')->section('content');
    }
}
