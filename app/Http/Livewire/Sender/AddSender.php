<?php

namespace App\Http\Livewire\Sender;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AddSender extends Component
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
            'license_image'=> 'required|mimes:png,jpg,jpeg',
            'image'=> 'required|mimes:png,jpg,jpeg',
            'load_type' => 'array'
        ])->validate();

        // if ($validated->fails()) {
        //     dd($validated->errors());
        //     // return $this->validationResponse($validated->errors());
        // }
        // dd($this->driver);
        $imagename = uniqid() . '.' . $this->driver['image']->getClientOriginalExtension();
        $this->driver['image']->storeAs('drivers', $imagename, 'real_public');

        $license = uniqid() . '.' . $this->driver['license_image']->getClientOriginalExtension();
        $this->driver['license_image']->storeAs('drivers', $imagename, 'real_public');

        $this->driver['image'] = $imagename;
        $this->driver['license_image'] = $license;
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
        return view('auth.register.driver')->extends('layout.auth')->section('content');
    }
}
