<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddVehicle extends Component
{
    // Tabs
    public $general = true;
    public $others = false;
    public $driver = false;
    public $documents = false;

    // Fields
    public $organisation_id;
    public $driver_id;
    public $image;
    public $load_type;
    public $vehicle_category_id;
    public $vehicle_subcategory_id;
    public $make;
    public $model;
    public $year;
    public $color;
    public $gps;
    public $engine_type;
    public $transmission;
    public $fuel_consumption;
    public $axle_type;
    public $weight;
    public $max_load_weight;
    public $width;
    public $height;
    public $length;
    public $owners_documents;
    public $road_worth_documents;
    public $insurance_documents;
    public $owner_name;
    public $owner_email;
    public $owner_phone;
    public $owner_address;
    // public $owner_name;
    // public $owner_email;
    // public $owner_phone;
    // public $owner_address;



    public function activate($tab)
    {
        if ($tab == 'general') {
            $this->general = true;
            $this->others = false;
            $this->driver = false;
            $this->documents = false;
        } else if ($tab == 'others') {
            $this->general = false;
            $this->others = true;
            $this->driver = false;
            $this->documents = false;
        } else if ($tab == 'driver') {
            $this->general = false;
            $this->others = false;
            $this->driver = true;
            $this->documents = false;
        } else if ($tab == 'documents') {
            $this->general = false;
            $this->others = false;
            $this->driver = false;
            $this->documents = true;
        }
    }

    public function general()
    {
    }

    public function render()
    {
        return view('fleet.vehicles.add')->extends('layout.app')->section('content');
    }
}
