<?php

namespace App\Http\Livewire\Sender;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UpdateSender extends Component
{
    use WithFileUploads;
    // Tabs
    public $general = true;
    public $billing = false;

    // Fields
    public $sender;
    //  [
    //     'image' => null,
    // ];
    public $load_list = [];
    public $sender_load_type = [];
    public $image;
    public $national_id;



    public function activate($tab)
    {
        if ($tab == 'general') {
            $this->general = true;
            $this->billing = false;
        } else if ($tab == 'billing') {
            $this->general = false;
            $this->billing = true;
        }
    }

    #[Computed]
    public function loads()
    {
        return DB::table('load_types')->get(['id', 'name']);
    }

    public function general()
    {
        $validated = Validator::make($this->sender, [
            'email' => 'required',
            'name' => 'required',
            'national_id' => 'nullable',
        ])->validate();


        if (is_file($this->image)) {
            $imagename = uniqid() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('logos', $imagename, 'real_public');
            $this->sender['image'] = $imagename;
        }

        if(is_file($this->sender['national_id'])){
            $img = uniqid() . '.' . $this->sender['national_id']->getClientOriginalExtension();
            $this->sender['national_id']->storeAs('senders', $img, 'real_public');
        }

        DB::table('senders')->where('mask',$this->sender['mask'])->update($this->sender);

        // $this->activate('payment');
        return redirect(route('sender.overview'));
    }



    public function mount($mask)
    {
        $sender = DB::table('senders')->where("mask", $mask)->first();
        // dd($sender);]
        foreach ($sender as $key => $dets) {
            if ($key == "load_type_id") {

                $this->load_list = json_decode($dets);
            } else {
                $this->sender[$key] = $dets;
            }
        }
    }

    public function render()
    {
        return view('senders.edit')->extends('layout.roles.sender')->section('content');
    }
}
