<?php

namespace App\Http\Livewire\Load;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SenderAddLoad extends Component
{
    use WithFileUploads;
    // Tabs
    public $general = true;
    public $payment = false;

    // Fields
    public $load;
    public $load_type = [];
    public $image;
    public $subload = [];
    public $license_image;
    public $pickup_address;
    public $dropoff_address;
    public $pickup_list = [];
    public $dropoff_list = [];
    public $search_pickup;
    public $search_dropoff;


    public function addSubLoad($num)
    {
        array_push($this->subload, $num);
    }

    public function delSubLoad($num)
    {
        array_splice($this->subload, $num, 1);
    }


    #[Computed]
    public function loads()
    {
        return DB::table('load_types')->get(['id', 'name']);
    }

    public function general()
    {
        dd($this->load);

        $this->load['image'] = $this->image;
        $validated = Validator::make($this->load, [
            'length' => 'required|numeric',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'breadth' => 'required|numeric',
            'insurance_docs' => 'required|mimes:pdf,docx,doc',
            'image' => 'required|mimes:png,jpg,jpeg',
            'other_docs' => 'required|mimes:pdf,docx,doc',
            'handling' => 'required'
        ])->validate();


        $load_id = generateNumber();

        $imagename = uniqid() . '.' . $this->image->getClientOriginalExtension();
        $this->load['image']->storeAs('loads', $imagename, 'real_public');

        $ins = uniqid() . '.' . $this->load['insurance_docs']->getClientOriginalExtension();
        $this->load['insurance_docs']->storeAs('loads', $ins, 'real_public');

        $oth = uniqid() . '.' . $this->load['other_docs']->getClientOriginalExtension();
        $this->load['other_docs']->storeAs('loads', $oth, 'real_public');

        $this->load['image'] = $imagename;
        $this->load['insurance_docs'] = $ins;
        $this->load['other_docs'] = $oth;
        $this->load['mask'] = $load_id;
        $this->load['status'] = "Pending";
        $this->load['shipment_status'] = "Unassigned";
        $this->load['sender_id'] = whichUser()->mask;
        $this->load['created_at'] = Carbon::now()->toDateTimeString();
        $this->load['pickup_address']= json_encode(getPlaceCoordinates($this->pickup_address));
        $this->load['dropoff_address']= json_encode(getPlaceCoordinates($this->dropoff_address));
        DB::table('loads')->insert($this->load);

        foreach ($this->subload as $load) {
            $load['load_id'] = $load_id;
            $load['created_at'] = Carbon::now()->toDateTimeString();
            DB::table('sub_loads')->insert($load);
        }

        return redirect(route('sender.loads'));
    }

    public function updated()
    {
        $this->search_pickup = $this->pickupSearch($this->search_pickup);
        $this->search_dropoff = $this->dropoffSearch($this->search_dropoff);
    }

    public function pickupSearch($field)
    {
        $this->pickup_list = lookupLocation($field);
        return $field;
    }

    public function dropoffSearch($field)
    {
        $this->dropoff_list = lookupLocation($field);
        return $field;
    }

    public function payment()
    {
    }

    public function render()
    {
        return view('load.senders.add')->extends('layout.roles.sender')->section('content');
    }
}
