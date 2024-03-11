<?php

namespace App\Http\Livewire\Driver;

use Livewire\Component;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;

class AddDriver extends Component
{
    // Tabs
    public $general = true;
    public $payment = false;

    // Fields
    public $driver;
    public $image;
    // public $phone;
    // public $email;
    // public $address;
    // public $description;
    // public $status;
    // public $license_number;
    // public $license_image;
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
        $imagename = uniqid() . '.' . $this->image->getClientOriginalExtension();
        $this->driver->image->storeAs('drivers', $imagename, 'real_public');

        DB::table('drivers')->insert($this->driver);
    }

    public function render()
    {
        return view('fleet.drivers.add')->extends('layout.app')->section('content');
    }
}
