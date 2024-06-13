<?php

namespace App\Http\Livewire\Driver;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AddDriver extends Component
{
    use WithFileUploads;
    // Tabs
    public $general = true;
    public $payment = false;

    // Fields
    public $driver = [
        'image' => null,
        'license_image' => null,
    ];
    public $load_type = [];
    public $image;
    public $license_image;



    public function activate($tab)
    {
        if ($tab == 'general') {
            $this->general = true;
            $this->payment = false;
        } else if ($tab == 'payment') {
            $this->general = false;
            $this->payment = true;
        }
    }

    #[Computed]
    public function loads()
    {
        return DB::table('load_types')->get(['id', 'name']);
    }

    public function general()
    {
        $validated = Validator::make($this->driver, [
            'email' => 'required',
            'name' => 'required',
            'license_image' => 'required|mimes:png,jpg,jpeg,pdf',
            'image' => 'required|mimes:png,jpg,jpeg',
            'load_type' => 'array'
        ])->validate();

        $imagename = uniqid() . '.' . $this->driver['image']->getClientOriginalExtension();
        $this->driver['image']->storeAs('logos', $imagename, 'real_public');

        $license = uniqid() . '.' . $this->driver['license_image']->getClientOriginalExtension();
        $this->driver['license_image']->storeAs('drivers', $imagename, 'real_public');

        $this->driver['image'] = $imagename;
        $this->driver['license_image'] = $license;
        $this->driver['load_type'] = json_encode($this->load_type);
        $this->driver['mask'] = Str::orderedUuid();
        $this->driver['organization_id'] = whichUser()->mask;

        $driverid = DB::table('drivers')->insertGetId($this->driver);

        // $this->activate('payment');
        return redirect(route("drivers"));
    }

    public function payment()
    {
    }

    public function render()
    {
        return view('fleet.drivers.add')->extends('layout.roles.organization')->section('content');
    }
}
