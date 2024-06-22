<?php

namespace App\Http\Livewire\Load;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AddLoad extends Component
{
    use WithFileUploads;
    // Tabs
    public $general = true;
    public $payment = false;

    // Fields
    public $load = [];
    public $load_type = [];
    public $image;
    public $subload = [];
    public $license_image;
    public $pickup_address;
    public $dropoff_address;


    public function addSubLoad($num)
    {
        array_push($this->subload,$num);
    }

    public function delSubLoad($num){
        array_splice($this->subload,$num,1);
    }



    #[Computed]
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
        dd($this->load);
        // dd($this->subload);
        $this->load['image'] = $this->image;
        $validated = Validator::make($this->load, [
            'sender_id' => 'required',
            'length' => 'required|numeric',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'status' => 'required',
            'breadth' => 'required|numeric',
            'insurance_docs'=> 'required|mimes:pdf,docx,doc',
            'image'=> 'required|mimes:png,jpg,jpeg',
            'other_docs'=> 'required|mimes:pdf,docx,doc',
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
        $this->load['mask']= $load_id;
        $this->load['created_at'] = Carbon::now()->toDateTimeString();
        DB::table('loads')->insert($this->load);

        foreach($this->subload as $load){
            $load['load_id'] = $load_id;
            $load['created_at'] = Carbon::now()->toDateTimeString();
            DB::table('sub_loads')->insert($load);
        }

        return redirect(route('loads'));

    }

    public function payment(){

    }

    public function render()
    {
        return view('load.add')->extends('layout.roles.organization')->section('content');
    }
}
