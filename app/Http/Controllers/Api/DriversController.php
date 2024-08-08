<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DriversController as ControllersDriversController;

class DriversController extends Controller
{
    use ResponseTrait;

    public function profile()
    {
        $driver = DB::table('drivers')->where('mask', auth()->user()->mask)->first(['image', 'name', 'email', 'phone', 'gender', 'dob', 'address', 'description', 'country', 'region', 'license_number', 'license_image', 'experience', 'last_login', 'last_location', 'shipment_status', 'organization_id','rating']);
        $shipments= DB::table('shipments')->where('driver_id', auth()->user()->mask)->where('shipment_status','Completed')->count();
        $driver->trips = $shipments;
        $org = DB::table('organizations')->where('mask', $driver->organization_id)->first(['image', 'name', 'email', 'phone', 'address', 'description', 'country', 'region']);
        $driver->organization = $org;
        $driver->last_location = json_decode($driver->last_location);

        return $this->successResponse('', $driver);
    }
}
