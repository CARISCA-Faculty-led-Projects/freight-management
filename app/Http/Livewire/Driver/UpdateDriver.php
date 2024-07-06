<?php

namespace App\Http\Livewire\Driver;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UpdateDriver extends Component
{
    use WithFileUploads;
    // Tabs
    public $general = true;
    public $payment = false;

    // Fields
    public $driver = [
        'image' => null,
        'license_image' => null,
        'load_type' => []
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

        if (is_file($this->image)) {
            unlink('storage/logos/' . $this->driver['image']);
            $imagename = uniqid() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('logos', $imagename, 'real_public');
            $this->driver['image'] = $imagename;
        }

        if (is_file($this->driver['license_image'])) {
            $license = DB::table('drivers')->where('mask', $this->driver['mask'])->first(['license_image']);
            if (file_exists('storage/drivers/' . $license->license_image)) {
                unlink('storage/drivers/' . $license->license_image);
            }
            $imagename = uniqid() . '.' . $this->driver['license_image']->getClientOriginalExtension();
            $this->driver['license_image']->storeAs('drivers', $imagename, 'real_public');
            $this->driver['license_image'] = $imagename;
        }

        $this->driver['updated_at'] = Carbon::now()->toDateTimeString();
        DB::table('drivers')->where('mask', $this->driver['mask'])->update($this->driver);

        // $this->activate('payment');
        return redirect(auth()->guard()->name == 'organizations' ? route('drivers') : route('driver.overview'));
    }

    public function mount($mask)
    {
        $driver = DB::table('drivers')->where('mask', $mask)->first();

        $this->driver = (array)$driver;
    }

    public function render()
    {
        return view('fleet.drivers.edit')->extends(auth()->guard()->name == 'organizations' ? 'layout.roles.organization' : 'layout.roles.driver')->section('content');
    }
}
