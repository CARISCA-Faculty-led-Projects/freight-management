<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddDriver extends Component
{
    // Tabs
    public $general = true;
    public $payment = false;

    // Fields
    public $image;
    public $name;
    public $phone;
    public $email;
    public $address;
    public $description;
    public $status;
    public $license_number;
    public $license_image;
    public $mask;
    public $password;



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

    public function general()
    {
    }

    public function render()
    {
        return view('fleet.drivers.add')->extends('layout.app')->section('content');
    }
}
