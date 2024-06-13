<?php

namespace App\Http\Livewire\Broker;

use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UpdateBroker extends Component
{
    use WithFileUploads;
    // Tabs
    public $general = true;
    public $payment = false;

    // Fields
    public $broker = [
        'image' => null,
        'license_image' => null,
        'load_type' => []
    ];
    public $load_type = [];
    public $image;
    public $national_id;
    public $password;
    public $con_password;


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
        Validator::make($this->broker, [
            'image' => 'required|mimes:jpg,png,jpeg',
            'email' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'national_id' => 'required|mimes:pdf',
        ])->validate();


        if (is_file($this->image)) {
            $imagename = uniqid() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('brokers', $imagename, 'real_public');
            $this->broker['image'] = $imagename;
        }

        if (is_file($this->national_id)) {
            $imagename = uniqid() . '.' . $this->national_id->getClientOriginalExtension();
            $this->national_id->storeAs('brokers', $imagename, 'real_public');
            $this->broker['national_id'] = $imagename;
        }

        DB::table('brokers')->where('mask', $this->broker['mask'])->update($this->broker);

        return redirect(route('broker.overview'));
    }

    public function change_pass()
    {
        // if($this->password == $this->con_password){

        // }else{
        //     return "Passwords do not match";
        // }
        // $validated = Validator::make([$this->password, $this->con_password], [
        //     'password' => 'required',
        //     'con_password' => 'required|same:password',
        // ])->validate();

        // dd($validated);

        // return back()->with('success',"Password Updated");

    }

    public function mount($mask)
    {
        $broker = DB::table('brokers')->where('mask', $mask)->first();
        $this->broker = (array)$broker;
    }

    public function render()
    {
        return view('brokers.edit')->extends(auth()->guard()->name == 'organizations' ? 'layout.roles.organization' : 'layout.roles.broker')->section('content');
    }
}
