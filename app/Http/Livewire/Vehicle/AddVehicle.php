<?php

namespace App\Http\Livewire\Vehicle;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
    public $vehicle = [
        'gps' => 'No',
        'transmission' => "Manual",
        'image' => null,
        'load_type'=> []
    ];
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

    protected $rules = [
        'name' => 'required',
        'email' => 'required',

    ];

    public $routes_counter = 1;
    public $veh_routes = [];

    public function addRoute($num)
    {
        array_push($this->veh_routes,$num);
    }

    public function updated(){
        $this->org_owned = $this->getOrg($this->org_owned);
    }

    public function getOrg($org) {
        if($org){
            $org = (array)DB::table('organizations')->where('mask',whichUser()->mask)->first(['name','phone','email','address']);

            $this->owner = $org;

        }else{
            $this->owner = [];
        }
        return $org;


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

        Validator::make($this->vehicle,[
            'image' => 'required|mimes:jpg,png,jpeg',
            'number' => 'required',
        ])->validate();

        $imagename = uniqid() . '.' . $this->vehicle['image']->getClientOriginalExtension();
        $this->vehicle['image']->storeAs('vehicles', $imagename, 'real_public');


        $vehicle = DB::table('vehicles')->insertGetId([
            'image' => $imagename,
            'organization_id' => Auth::user()->mask,
            'load_type' => json_encode($this->vehicle['load_type']),
            'vehicle_category_id' => $this->vehicle['vehicle_category_id'],
            'vehicle_subcategory_id' => $this->vehicle['vehicle_subcategory_id'],
            'make' => $this->vehicle['make'],
            'model' => $this->vehicle['model'],
            'number' => $this->vehicle['number'],
            'year' => $this->vehicle['year'],
            'color' => $this->vehicle['color'],
            'gps' => $this->vehicle['gps'],
            'mask' => Str::orderedUuid(),
            'engine_type' => $this->vehicle['engine_type'],
            'transmission' => $this->vehicle['transmission'],
            'fuel_consumption' => $this->vehicle['fuel_consumption'],
            'axle_type' => $this->vehicle['axle_type']
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
        // dd($this->documents);
        $owners = uniqid() . '.' . $this->owners_documents->getClientOriginalExtension();
        $this->owners_documents->storeAs('vehicles', $owners, 'real_public');

        $roadworth = uniqid() . '.' . $this->road_worth_documents->getClientOriginalExtension();
        $this->road_worth_documents->storeAs('vehicles', $roadworth, 'real_public');

        $insurance = uniqid() . '.' . $this->insurance_documents->getClientOriginalExtension();
        $this->insurance_documents->storeAs('vehicles', $insurance, 'real_public');


        DB::table('vehicles')->where('mask',$this->owner['vehicle_id'])->update([
            'owners_documents' => $owners,
            'road_worth_documents' => $insurance,
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
        return view('fleet.vehicles.add')->extends('layout.roles.organization')->section('content');
    }
}
