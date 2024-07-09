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

    public function overview()
    {
        $drivers = DB::table("drivers")->where('organization_id', whichUser()->mask)->count();
        $brokers = DB::table("brokers")->where('organization_id', whichUser()->mask)->count();
        $vehicles = DB::table("vehicles")->where('organization_id', whichUser()->mask)->count();
        $shipments = DB::table("shipments")->where('organization_id', whichUser()->mask)->count();
        $active_shipments = DB::table("shipments")->where('organization_id', whichUser()->mask)->where('shipment_status', 'On route')->count();

        return view('organization.overview', compact('drivers', 'brokers', 'vehicles', 'shipments', 'active_shipments'));
    }

    public function dashboardCharts()
    {
        $spm = [];
        $sr = [];
        $months = array_map(fn ($month) => Carbon::create(null, $month)->format('M'), range(1, 12));
        $drivers = DB::table('drivers')->where("organization_id", whichUser()->mask)->pluck('mask')->toArray();

        // Shipments per month of the year
        for ($m = 1; $m <= 12; $m++) {
            $shipments = DB::table('shipments')->whereIn('driver_id', $drivers)->whereMonth('created_at', $m)->count();
            array_push($spm,['months'=> $months[$m-1],'qty'=> $shipments]);
        }

        // Shipments success and failure rates
        $shipments = DB::table('shipments')->where('organization_id', whichUser()->mask)->get();
        foreach($shipments as $shipment){
            if(in_array($shipment->shipment_status,$sr)){
                $sr[$shipment->shipment_status] ++      ;
            }else{
                $sr[$shipment->shipment_status] = 1;
            }
        }

        // Active brokers per month


        return $this->successResponse('', ["spm"=>$spm,'sr'=>$sr]);
    }

    public function index()
    {
        $organizations = DB::table('organizations')->get();
        return view('organization.list', compact('organizations'));
    }

    public function details($organization)
    {
        $org_details = DB::table('organizations')->where('mask', $organization)->first();

        $org_routes = DB::table('routes')->where('organization_id', $organization)->get();

        return view('organization.details', compact('org_details', 'org_routes'));
    }

    public function destroy($org)
    {
        DB::table('organizations')->where('mask', $org)->delete();
        DB::table('routes')->where('organization_id', $org)->delete();

        return redirect()->back()->with('success', "Organization deleted successfully");
    }
}
