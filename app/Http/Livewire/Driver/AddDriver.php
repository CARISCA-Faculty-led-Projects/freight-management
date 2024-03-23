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
    public $driver;
    public $load_type = [];
    public $image;
    // public $phone;
    // public $email;
    // public $address;
    // public $description;
    // public $status;
    // public $license_number;
    public $license_image;
    // public $mask;
    // public $password;



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
            'name' => 'required'
        ]);

        if ($validated->fails()) {
            dd($validated->errors());
            // return $this->validationResponse($validated->errors());
        }
        $imagename = uniqid() . '.' . $this->image->getClientOriginalExtension();
        $this->image->storeAs('drivers', $imagename, 'real_public');

        $imagename = uniqid() . '.' . $this->driver['license_image']->getClientOriginalExtension();
        $this->driver['license_image']->storeAs('drivers', $imagename, 'real_public');

        $this->driver['image'] = $imagename;
        $this->driver['license_image'] = $imagename;
        $this->driver['load_type'] = json_encode($this->load_type);
        $this->driver['mask']= Str::orderedUuid();
        $driverid = DB::table('drivers')->insertGetId($this->driver);

        // $this->activate('payment');
        return redirect()->to('/fleet/drivers');

    }

    public function payment(){

    }

    public function render()
    {
        return view('fleet.drivers.add')->extends('layout.app')->section('content');
    }
}
