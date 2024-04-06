<?php

namespace App\Http\Livewire\Organization;

use Livewire\Component;
use Illuminate\Support\Str;
use GuzzleHttp\Psr7\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterOrganization extends Component
{
    use WithFileUploads;

    public $count = 0;
    public $general = true;
    public $routes = false;
    public $subscription = false;
    public $payin = false;

    // Fields General
    public $org =[
        'image'=> null,
        'registration_docs' => null,
        'insurance_docs' => null,
        'load_type' => []
    ] ;
    public $mask;

    // Fields Routes
    public $org_routes = [];

    private function setMask()
    {
        $this->mask = Str::orderedUuid();
    }

    public function addRoute($num)
    {
        array_push($this->org_routes,$num);
    }

    public function delRoute($route){
        array_splice($this->org_routes,$route,1);
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

    public function general()
    {
        $validated = Validator::make($this->org,[
            'image' => 'required|mimes:jpg,png,jpeg',
            'email' => 'required',
            'name' => 'required',
            'registration_docs'=> 'required|mimes:pdf',
            'insurance_docs'=> 'required|mimes:pdf',
            'load_type' => 'array'
        ])->validate();

        $this->setMask();

        $org_image = uniqid() . '.' . $this->org['image']->getClientOriginalExtension();
        $regdoc = uniqid() . '.' . $this->org['registration_docs']->getClientOriginalExtension();
        $insdoc = uniqid() . '.' . $this->org['insurance_docs']->getClientOriginalExtension();
        $this->org['image']->storeAs('logos', $org_image, 'real_public');
        $this->org['registration_docs']->storeAs('org_registration', $regdoc, 'real_public');
        $this->org['insurance_docs']->storeAs('org_insurance', $insdoc, 'real_public');

        $this->org['mask'] = $this->mask;
        $this->org['account_id'] = "ID-" . generateAccNumber();
        $this->org['created_at'] = Carbon::now()->toDateTimeString();


        $org_id = DB::table('organizations')->insertGetId([
            'image' => $org_image,
            'country' => $this->org['country'],
            'region' => $this->org['region'],
            'load_type' => json_encode($this->org['load_type']),
            'name' => $this->org['name'],
            'description' => $this->org['description'],
            'email' => $this->org['email'],
            'phone' => $this->org['phone'],
            'address' => $this->org['address'],
            'registration_docs' => $this->org['registration_docs'],
            'insurance_docs' => $this->org['insurance_docs'],
            'mask' => $this->mask,
            'account_id' => $this->org['account_id'],
            "tax_id" => $this->org['tax_id'],
            'status' => "Approved",
            'created_at' => Carbon::now()->toDateTimeString()

        ]);

        DB::table('users')->insert([
            'account_id' => $this->mask,
            'account_type' => 'Organization',
            'email' => $this->org['email'],
            'password' => Hash::make($this->org['password']),
            'created_at' => $this->org['created_at']
        ]);

        $this->mask = $org_id;

        $this->activate('routes');
    }

    #[Computed]
    public function loads()
    {
        return DB::table('load_types')->get(['id', 'name']);
    }

    public function routes()
    {
        $getOrgMask = DB::table('organizations')->where("id", $this->mask)->pluck('mask')->first();
        // dd($getOrgMask);
        foreach ($this->org_routes as $route) {
            DB::table('routes')->insert([
                'organization_id' => $getOrgMask,
                'origin' => $route['origin'],
                'destination' => $route['dest'],
                'created_at' => Carbon::now()->toDateTimeString()
            ]);
        }

        return redirect()->to('/organization/list');

        // $this->activate('subscription');

    }

    public function render()
    {
        return view('auth.register.organization')->extends('layout.auth')->section('content');
    }
}
