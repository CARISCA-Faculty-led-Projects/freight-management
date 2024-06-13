<?php

namespace App\Http\Livewire\Organization;

use App\Models\Organization;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isEmpty;

class UpdateOrganization extends Component
{
    use WithFileUploads;

    public $count = 0;
    public $general = true;
    public $routes = false;
    public $subscription = false;
    public $payin = false;

    protected $listeners = [''];

    // Fields General
    public $org = [
        'load_type' => []
    ];
    public $image;
    public $mask;
    public $org_load_type = [];
    public $org_load_list = [];
    public $org_name;

    // Fields Routes
    public $routes_counter = 1;
    public $org_routes = [];

    public function activate($tab)
    {
        if ($tab == 'general') {
            $this->general = true;
            $this->routes = false;
            $this->subscription = false;
            $this->payin = false;
        } else if ($tab == 'routes') {
            $this->general = false;
            $this->routes = true;
            $this->subscription = false;
            $this->payin = false;
        } else if ($tab == 'subscription') {
            $this->general = false;
            $this->routes = false;
            $this->subscription = true;
            $this->payin = false;
        } else if ($tab == 'payin') {
            $this->general = false;
            $this->routes = false;
            $this->subscription = false;
            $this->payin = true;
        }
    }

    public function addRoute($num)
    {
        array_push($this->org_routes,$num);
    }

    public function delRoute($route){
        array_splice($this->org_routes,$route,1);
    }


    #[Computed]
    public function loads()
    {
        return DB::table('load_types')->get(['id', 'name']);
    }

    public function load_edit($state, $field)
    {
        if (in_array($field, $this->org['load_type'])) {
            foreach ($this->org['load_type'] as $key => $load) {
                if ($load == $field) {
                    unset($this->org['load_type'][$key]);
                }
            }
        } else {
            array_push($this->org['load_type'], $field);
        }

        // dd($newload);
        dd($this->org['load_type']);
    }

    public function general()
    {

        if ($this->org_load_type != []) {
            $this->org['load_type'] = json_encode($this->org_load_type);
        }

        if (is_file($this->image)) {
            $org_image = uniqid() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('logos', $org_image, 'real_public');
            $this->org['image'] = $org_image;
        }

        if (is_file($this->org['insurance_docs'])) {
            $org_image = uniqid() . '.' . $this->org['insurance_docs']->getClientOriginalExtension();
            $this->org['insurance_docs']->storeAs('org_insurance', $org_image, 'real_public');
            $this->org['insurance_docs'] = $org_image;
        }

        if (is_file($this->org['registration_docs'])) {
            $org_image = uniqid() . '.' . $this->org['registration_docs']->getClientOriginalExtension();
            $this->org['registration_docs']->storeAs('org_registration', $org_image, 'real_public');
            $this->org['registration_docs'] = $org_image;
        }


        $this->org['updated_at'] = Carbon::now()->toDateTimeString();
        DB::table('organizations')->where('mask', $this->org['mask'])->update($this->org);

        // $this->activate('routes');
        return redirect(route('org.overview'))->with('success','Profile Update successful');

    }

    public function routes()
    {
        foreach ($this->org_routes as $route) {
            if (array_key_exists('id', $route)) {
                DB::table('routes')->where('organization_id', $this->org['mask'])->where('id', $route['id'])->update([
                    'origin' => $route['origin'],
                    'destination' => $route['destination'],
                    'updated_at' => Carbon::now()->toDateTimeString()
                ]);
            } else {
                DB::table('routes')->insert([
                    'organization_id' => $this->org['mask'],
                    'origin' => $route['origin'],
                    'destination' => $route['destination'],
                    'created_at' => Carbon::now()->toDateTimeString()
                ]);
            }
        }

        return redirect(route('org.overview'))->with('success','Profile Update successful');
        // $this->activate('subscription');

    }

    public function mount($mask)
    {
        $this->mask = $mask;
        // Organization details
        $org_dets = DB::table('organizations')->where("mask", $this->mask)->first();

        foreach ($org_dets as $key => $dets) {
            if ($key == "load_type") {

                $this->org_load_list = json_decode($dets);
            } else {
                $this->org[$key] = $dets;
            }
        }

        $org_rou = DB::table('routes')->where("organization_id", $this->mask)->get();
        for ($a = 0; $a < count($org_rou); $a++) {
            $this->org_routes[$a] = $org_rou[$a];
        }
    }

    public function render()
    {



        return view('organization.edit-organization')->extends('layout.roles.organization')->section('content');
    }
}
