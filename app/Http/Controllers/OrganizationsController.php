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
        $s_complete = 0;
        $s_pending = 0;
        $s_cancelled = 0;

        $shipments = DB::table('shipments')->where('organization_id', whichUser()->mask)->count();
        if ($shipments) {
            $s_com = DB::table('shipments')->where('organization_id', whichUser()->mask)->where('shipment_status', 'Delivered')->count();
            $s_complete = ($s_com / $shipments) * 100;
            $s_pen = DB::table('shipments')->where('organization_id', whichUser()->mask)->where('shipment_status', 'Assigned')->count();
            $s_pending = ($s_pen / $shipments) * 100;
            $s_can = DB::table('shipments')->where('organization_id', whichUser()->mask)->where('shipment_status', 'Cancelled')->count();
            $s_cancelled = ($s_can / $shipments) * 100;
        }

        $shipment_stats = [
            'complete' => $s_complete,
            'pending' => $s_pending,
            'cancelled' => $s_cancelled,
        ];

        return view('organization.overview', compact('drivers', 'brokers', 'vehicles', 'shipments', 'active_shipments', 'shipment_stats'));
    }

    public function dashboardCharts()
    {
        $spm = [];
        $active_brokers_pm = [];
        $months = array_map(fn ($month) => Carbon::create(null, $month)->format('M'), range(1, 12));
        $drivers = DB::table('drivers')->where("organization_id", whichUser()->mask)->pluck('mask')->toArray();
        // Active brokers per month
        $brokers = DB::table('brokers')->where('organization_id', whichUser()->mask)->pluck('mask')->toArray();

        // Shipments per month of the year
        for ($m = 1; $m <= 12; $m++) {
            $shipments = DB::table('shipments')->whereIn('driver_id', $drivers)->whereMonth('created_at', $m)->count();
            $activity = DB::table('login_activity')->whereIn('mask', $brokers)->whereMonth('created_at', $m)->count();
            array_push($spm, ['months' => $months[$m - 1], 'qty' => $shipments]);
            array_push($active_brokers_pm, ['months' => $months[$m - 1], 'qty' => $activity]);
        }

        // Shipments success and failure rates$
        $ss = []; //shipment status series
        $sl = []; //shipment status labels
        $s_com = DB::table('shipments')->where('organization_id', whichUser()->mask)->where('shipment_status', 'Delivered')->count();
        array_push($ss, $s_com);
        array_push($sl, "Delivered");
        $s_pen = DB::table('shipments')->where('organization_id', whichUser()->mask)->where('shipment_status', 'Assigned')->count();
        array_push($ss, $s_pen);
        array_push($sl, "Pending");
        $s_can = DB::table('shipments')->where('organization_id', whichUser()->mask)->where('shipment_status', 'Cancelled')->count();
        array_push($ss, $s_can);
        array_push($sl, "Cancelled");

        return $this->successResponse('', ["spm" => $spm, 'abpm' => $active_brokers_pm, 'sr' => ['series' => $ss, 'labels' => $sl]]);
    }

    public function orgMapData()
    {
        $loads = DB::table('loads')->where('organization_id', whichUser()->mask)
            ->where('shipment_status', "Unassigned")
            ->join('senders', 'senders.mask', 'loads.sender_id')
            ->get(['loads.image', 'loads.mask', 'pickup_address', 'senders.name as sender', 'senders.phone as sender_phone']);
        foreach ($loads as $load) {
            $load->pickup_address = json_decode($load->pickup_address);
        }

        $shipments = DB::table('shipments')->where('shipments.shipment_status', "On route")
            ->join('drivers', 'drivers.mask', 'shipments.driver_id')
            ->select('shipments.mask as shipment', 'shipments.last_location as shipment_location', 'drivers.name as driver', 'drivers.mask as driver_id', 'drivers.phone as driver_contact')
            ->get();

        foreach ($shipments as $shipment) {
            $shipment->shipment_location = json_decode($shipment->shipment_location);
        }

        $drivers = DB::table('drivers')->where('organization_id', whichUser()->mask)->where('shipment_status', 'Unassigned')->get(['image', 'name', 'phone', 'mask', 'last_login', 'last_location']);
        foreach ($drivers as $driver) {
            $driver->last_location = json_decode($driver->last_location);
        }

        $vehicles = DB::table('vehicles')->where('organization_id', whichUser()->mask)->where('shipment_status', 'Unassigned')->get(['image', 'number', 'make', 'model', 'mask', 'last_location']);
        foreach ($vehicles as $vehicle) {
            $vehicle->last_location = json_decode($vehicle->last_location);
        }

        return $this->successResponse('', ['loads' => $loads, 'shipments' => $shipments, 'drivers' => $drivers, 'vehicles' => $vehicles]);
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
