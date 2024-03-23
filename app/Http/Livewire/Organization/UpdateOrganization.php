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
    // public $mask = '9b7c8b3e-22a1-48f9-920d-e964e67dde63';
    public $mask;
    // public $org_country;
    // public $org_region;
    public $org_load_type = [];
    public $org_load_list = [];
    public $org_name;
    // public $org_desc;
    // public $org_email;
    // public $org_phone;
    // public $org_address;
    // public $org_reg_docs;
    // public $org_ins_docs;
    // public $password;
    // public $mask;

    // Fields Routes
    public $routes_counter = 1;
    public $org_routes = [];

    public function addRoute()
    {
        $this->routes_counter += 1;
    }

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

    #[Computed]
    public function loads()
    {
        return DB::table('load_types')->get(['id', 'name']);
    }

    public function load_edit($state, $field)
    {
        if (in_array($field, $this->org['load_type'])) {
            // array_push($this->org_load_type, $field);
            foreach ($this->org['load_type'] as $key => $load) {
                if ($load == $field) {
                    // dd("Key:".$key."/".$load."/".$field);
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

        // dd($this->org);

        if (is_file($this->org['image'])) {
            $org_image = uniqid() . '.' . $this->org['image']->getClientOriginalExtension();
            $this->org['image']->storeAs('logos', $org_image, 'real_public');
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

        DB::table('users')->where('account_id', $this->org['mask'])->update([
            'email' => $this->org['email'],
            'updated_at' => $this->org['updated_at']
        ]);

        $this->activate('routes');
    }

    public function routes()
    {
        // dd($this->org_routes);   
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

        return redirect()->to('/organization/list');
        // $this->activate('subscription');

    }

    public function mount($mask)
    {
        $this->mask = $mask;
        // Organization details
        $org_dets = DB::table('organizations')->where("mask", $this->mask)->first();

        foreach ($org_dets as $key => $dets) {
            if ($key == "load_type") {
                // $this->org[$key] = json_decode($dets);
                $this->org_load_list = json_decode($dets);
            } else {
                $this->org[$key] = $dets;
            }
        }
        //  dd($this->org);
        $org_rou = DB::table('routes')->where("organization_id", $this->mask)->get();
        // $this->routes_counter = count($org_rou);
        // array_push($this->org_routes,$org_rou);
        for ($a = 0; $a < count($org_rou); $a++) {
            // dd($org_rou[$a]);
            // $this->routes_counter = 0;
            $this->org_routes[$a] = $org_rou[$a];
            $this->routes_counter += $a;
            // $this->addRoute();
        }
    }

    public function render()
    {



        return view('organization.edit-organization')->extends('layout.app')->section('content');
    }
}
