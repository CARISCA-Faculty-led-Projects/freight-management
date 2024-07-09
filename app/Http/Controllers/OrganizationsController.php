<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrganizationsController extends Controller
{
use ResponseTrait;

    public function overview(){
        $drivers = DB::table("drivers")->where('organization_id',whichUser()->mask)->count();
        $brokers = DB::table("brokers")->where('organization_id',whichUser()->mask)->count();
        $vehicles = DB::table("vehicles")->where('organization_id',whichUser()->mask)->count();
        $shipments = DB::table("shipments")->where('organization_id',whichUser()->mask)->count();
        $active_shipments = DB::table("shipments")->where('organization_id',whichUser()->mask)->where('shipment_status','On route')->count();

        return view('organization.overview',compact('drivers','brokers','vehicles','shipments','active_shipments'));
    }

    public function dashboardCharts(){
      
        $months = array_map(fn($month) => Carbon::create(null, $month)->format('M'), range(1, 12));
        $drivers = DB::table('drivers')->where("organization_id",whichUser()->mask)->get();

        // foreach($drivers as $driver){

        // }
        // $drivers = DB::table('shipments')->where('organization_id',whichUser()->mask)->groupBy('driver_id')->get();

        return $this->successResponse('',$months);
    }
    
    public function index(){
        $organizations = DB::table('organizations')->get();
        return view('organization.list',compact('organizations'));
    }

    public function details($organization){
        $org_details = DB::table('organizations')->where('mask',$organization)->first();

        $org_routes = DB::table('routes')->where('organization_id',$organization)->get();

        return view('organization.details',compact('org_details','org_routes'));
    }

    public function destroy($org){
        DB::table('organizations')->where('mask',$org)->delete();
        DB::table('routes')->where('organization_id',$org)->delete();

        return redirect()->back()->with('success',"Organization deleted successfully");
    }
}
