<?php

namespace App\Http\Livewire\Organization;

use GuzzleHttp\Psr7\Request;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AddOrganization extends Component
{
    use WithFileUploads;

    public $count = 0;
    public $general = true;
    public $routes = false;
    public $subscription = false;
    public $payin = false;

    // Fields General
    public $org_image;
    public $org_country;
    public $org_region;
    public $org_load_type = [];
    public $org_name;
    public $org_desc;
    public $org_email;
    public $org_phone;
    public $org_address;
    public $org_reg_docs;
    public $org_ins_docs;
    public $password;
    public $mask;

    // Fields Routes
    public $routes_counter = 1;
    public $org_routes = [];

    private function setMask()
    {
        $this->mask = Str::orderedUuid();
    }

    public function addRoute()
    {
        $this->routes_counter++;
    }

    public function increment()

    {

        $this->count++;
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
        $this->setMask();

        $org_image = uniqid() . '.' . $this->org_image->getClientOriginalExtension();
        $regdoc = uniqid() . '.' . $this->org_reg_docs->getClientOriginalExtension();
        $insdoc = uniqid() . '.' . $this->org_ins_docs->getClientOriginalExtension();
        $this->org_image->storeAs('logos', $org_image, 'real_public');
        $this->org_reg_docs->storeAs('org_registration', $regdoc, 'real_public');
        $this->org_ins_docs->storeAs('org_insurance', $insdoc, 'real_public');

        $org_id = DB::table('organizations')->insertGetId([
            'image' => $org_image,
            'country' => $this->org_country,
            'region' => $this->org_region,
            'load_type' => json_encode($this->org_load_type),
            'name' => $this->org_name,
            'description' => $this->org_desc,
            'email' => $this->org_email,
            'phone' => $this->org_phone,
            'address' => $this->org_address,
            'registration_docs' => $regdoc,
            'insurance_docs' => $insdoc,
            'mask' => $this->mask,
            'account_id' => "ID-" . generateAccNumber(),
            "tax_id" => "TX-" . generateTaxnNumber(),
            'status' => "Pending",
            'created_at' => Carbon::now()->toDateTimeString()

        ]);

        DB::table('users')->insert([
            'account_id' => $this->mask,
            'account_type' => 'Organization',
            'email' => $this->org_email,
            'password' => Hash::make($this->password),
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        $this->mask = $org_id;

        $this->activate('routes');
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
        return view('organization.add-organization')->extends('layout.app')->section('content');
    }
}
