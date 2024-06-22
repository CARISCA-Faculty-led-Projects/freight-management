<?php

namespace App\Http\Livewire\Vehicle;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class UpdateVehicle extends Component
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
    public $vehicle;

    public $owner;
    public $org_owned;

    public $driver_details;

    public $vehicle_id;
    public $owners_documents;
    public $road_worth_documents;
    public $insurance_documents;
    public $drivers;
    // public $owner_name;
    // public $owner_email;
    // public $owner_phone;
    // public $owner_address;

    public $routes_counter = 1;
    public $veh_routes = [];

    public function addRoute($num)
    {
        array_push($this->veh_routes,$num);
    }

    public function delRoute($route){
        array_splice($this->veh_routes,$route,1);
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
        if (is_file($this->vehicle['image'])) {
            $imagename = uniqid() . '.' . $this->vehicle['image']->getClientOriginalExtension();
            $this->image->storeAs('vehicles', $imagename, 'real_public');
            $this->vehicle['image'] = $imagename;
        }

        if ($this->load_type != []) {
            $this->vehicle['load_type'] = json_encode($this->load_type);
        }

        DB::table('vehicles')->where('mask', $this->vehicle['mask'])->update($this->vehicle);

        $this->activate('others');
    }

    public function others()
    {
        DB::table('vehicle_owners')->where('vehicle_id', $this->vehicle['mask'])->where('id', $this->owner['id'])->update($this->owner);

        DB::table('vehicles')->where('mask', $this->vehicle['mask'])->update([
            'weight' => $this->vehicle['weight'],
            'height' => $this->vehicle['height'],
            'width' => $this->vehicle['width'],
            'length' => $this->vehicle['length'],
            'max_load_weight' => $this->vehicle['max_load_weight'],
        ]);


        foreach ($this->veh_routes as $route) {
            if (array_key_exists('id', $route)) {
                DB::table('vehicle_routes')->where('vehicle_id', $this->vehicle['mask'])->where('id', $route['id'])->update([
                    'origin' => $route['origin'],
                    'destination' => $route['destination'],
                    'updated_at' => Carbon::now()->toDateTimeString()
                ]);
            } else {
                DB::table('vehicle_routes')->insert([
                    'vehicle_id' => $this->vehicle['mask'],
                    'origin' => $route['origin'],
                    'destination' => $route['destination'],
                    'created_at' => Carbon::now()->toDateTimeString()
                ]);
            }
        }
        $this->activate('documents');
    }

    public function documents()
    {
        if(is_file($this->owners_documents)){
            unlink('storage/vehicles/'.$this->vehicle['owners_documents']);
            $owners = uniqid() . '.' . $this->owners_documents->getClientOriginalExtension();
            $this->owners_documents->storeAs('vehicles', $owners, 'real_public');
            $this->vehicle['owners_documents'] = $owners;
        }

        if(is_file($this->road_worth_documents)){
            unlink('storage/vehicles/'.$this->vehicle['road_worth_documents']);
            $roadworth = uniqid() . '.' . $this->road_worth_documents->getClientOriginalExtension();
            $this->road_worth_documents->storeAs('vehicles', $roadworth, 'real_public');
            $this->vehicle['road_worth_documents'] = $roadworth;
        }

        if(is_file($this->insurance_documents)){
            unlink('storage/vehicles/'.$this->vehicle['insurance_documents']);
            $insurance = uniqid() . '.' . $this->insurance_documents->getClientOriginalExtension();
            $this->insurance_documents->storeAs('vehicles', $insurance, 'real_public');
            $this->vehicle['insurance_documents'] = $insurance;
        }

        DB::table('vehicles')->where('mask', $this->vehicle['mask'])->update([
            'owners_documents' => $this->vehicle['owners_documents'],
            'road_worth_documents' => $this->vehicle['road_worth_documents'],
            'insurance_documents' => $this->vehicle['insurance_documents'],
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

    public function drivers(){
        return DB::table('drivers')->where('organization_id',$this->vehicle['organization_id'])->get();

    }

    public function mount($mask)
    {
        $vehicle = DB::table('vehicles')->where('mask', $mask)->first();

        $assigned_vehicles = DB::table('vehicles')->where('organization_id',$vehicle->organization_id)->pluck('driver_id')->toArray();

        // dd($drivers);

        $vroutes = DB::table('vehicle_routes')->where('vehicle_id', $vehicle->mask)->get();
        for ($a = 0; $a < count($vroutes); $a++) {
            $this->veh_routes[$a] = $vroutes[$a];
        }
        $vowners = DB::table('vehicle_owners')->where('vehicle_id', $vehicle->mask)->first();
        // dd($vroutes);
        $this->vehicle = (array)$vehicle;
        $this->routes_counter = count($vroutes);
        $this->owner = (array)$vowners;
    }

    public function render()
    {
        return view('fleet.vehicles.edit')->extends('layout.roles.organization')->section('content');
    }
}
