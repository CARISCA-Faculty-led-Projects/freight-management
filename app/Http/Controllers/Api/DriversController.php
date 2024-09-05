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

    public function rate_driver(Request $request)
    {
        $shipment = DB::table('loads')->where('mask', $request->load_id)->pluck('shipment_id')->first();

        $driver_id = DB::table('shipments')->where('mask',$shipment)->pluck('driver_id')->first();

        DB::table('driver_ratings')->insert(['driver_id' => $driver_id, 'rating' => $request->rating]);

        $ratings = DB::table('driver_ratings')->where('driver_id', $driver_id);
        $total = $ratings->count();
        $sum = $ratings->sum('rating');

        $curr = $sum / $total;
        DB::table('drivers')->where('mask', $driver_id)->update(['rating' => $curr]);

        return $this->successResponse('driver rated');
    }

    public function dashboard() {
        $driver = DB::table('drivers')->where('mask',whichUser()->mask)->first(['name','image']);

        $shipments = DB::table('shipments')->where('driver_id',whichUser()->mask)->get();

        foreach($shipments as $shipment){
            $shipment->loads = count(json_decode($shipment->loads));
        }

        return $this->successResponse('',['driver'=>$driver,'shipments'=>$shipments]);

    }
}
