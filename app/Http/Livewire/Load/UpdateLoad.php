<?php

namespace App\Http\Livewire\Load;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UpdateLoad extends Component
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
    public $fsubload = [];
    public $license_image;
    public $pickup_address;
    public $dropoff_address;
    public $pickup_list = [];
    public $dropoff_list = [];
    public $search_pickup;
    public $search_dropoff;


    public function addSubLoad($num)
    {
        array_push($this->fsubload, $num);
    }

    public function delSubLoad($num,$v = 'o')
    {
        if($v = 'o'){
            array_splice($this->subload, $num, 1);
        }else{
            array_splice($this->fsubload, $num, 1);
        }
    }

    public function loads()
    {
        return DB::table('load_types')->get(['id', 'name']);
    }

    public function senders()
    {
        return DB::table('senders')->get(['mask', 'name']);
    }

    public function general()
    {
        $validated = Validator::make($this->load, [
            'sender_id' => 'required',
            'length' => 'required',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'status' => 'required',
            'breadth' => 'required|numeric',
        ])->validate();

        if (is_file($this->image)) {
            $imagename = uniqid() . '.' . $this->image->getClientOriginalExtension();
            $this->load['image']->storeAs('loads', $imagename, 'real_public');
            $this->load['image'] = $imagename;
        }

        if (is_file($this->load['insurance_docs'])) {
            $ins = uniqid() . '.' . $this->load['insurance_docs']->getClientOriginalExtension();
            $this->load['insurance_docs']->storeAs('loads', $ins, 'real_public');
            $this->load['insurance_docs'] = $ins;
        }

        if (is_file($this->load['other_docs'])) {
            $oth = uniqid() . '.' . $this->load['other_docs']->getClientOriginalExtension();
            $this->load['other_docs']->storeAs('loads', $oth, 'real_public');
            $this->load['other_docs'] = $oth;
        }

        $this->load['updated_at'] = Carbon::now()->toDateTimeString();
        if ($this->pickup_address != null) {
            $this->load['pickup_address'] = json_encode(getPlaceCoordinates($this->pickup_address));
        }
        if ($this->dropoff_address != null) {
            $this->load['dropoff_address'] = json_encode(getPlaceCoordinates($this->dropoff_address));
        }
        DB::table('loads')->where('mask', $this->load['mask'])->update($this->load);

        foreach ($this->subload as $sload) {
            if (array_key_exists('id', $sload)) {
                $this->subload['updated_at'] = Carbon::now()->toDateTimeString();
                DB::table('sub_loads')->where('load_id', $sload['load_id'])->where('id', $sload['id'])->update($sload);
            } else {
                $sload['load_id'] = $this->load['mask'];
                $sload['created_at'] = Carbon::now()->toDateTimeString();
                DB::table('sub_loads')->insert($sload);
            }
        }
        if (whichUser()->getTable() == 'senders') {
            return redirect(route('sender.loads'));
        } else {
            return redirect(route('loads'));
        }
    }

    public function payment()
    {
    }


    public function mount($load_id)
    {
        $this->load = (array) DB::table('loads')->where('mask', $load_id)->first(['image', 'organization_id', 'load_type', 'sender_id', 'description', 'budget', 'quantity', 'length', 'weight', 'height', 'breadth', 'handling', 'pickup_address', 'dropoff_address', 'insurance_docs','mask','status','payment_status','shipment_status','other_docs','completed','created_at']);
        $this->subload = DB::table('sub_loads')->where('load_id', $load_id)->get()->toArray();
    }

    public function render()
    {
        if (whichUser()->getTable() == 'senders') {
            return view('load.edit')->extends('layout.roles.sender')->section('content');
        } else {
            return view('load.edit')->extends('layout.roles.organization')->section('content');
        }
    }
}
