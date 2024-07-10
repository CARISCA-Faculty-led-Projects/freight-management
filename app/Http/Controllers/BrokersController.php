<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BrokersController extends Controller
{
    use ResponseTrait;

    public function overview()
    {
        $loads = DB::table("loads")->where('org_assigned_by', whichUser()->mask)->count();
        $shipments = DB::table("shipments")->where('broker_id', whichUser()->mask)->count();
        $pending_shipments = DB::table("shipments")->where('broker_id', whichUser()->mask)->where('shipment_status', 'Assigned')->count();
        $completed_shipments = DB::table("shipments")->where('broker_id', whichUser()->mask)->where('shipment_status', 'Delivered')->count();

        return view('brokers.overview', compact('loads', 'shipments', 'pending_shipments', 'completed_shipments'));
    }

    public function dashboardCharts()
    {
        $spm = [];
        $months = getMonths();

        // Shipments per month of the year
        for ($m = 1; $m <= 12; $m++) {
            $shipments = DB::table('shipments')->where('broker_id', whichUser()->mask)->whereMonth('created_at', $m)->count();
            array_push($spm, ['months' => $months[$m - 1], 'qty' => $shipments]);
        }
        return $this->successResponse('', ["spm" => $spm]);
    }

    public function list()
    {
        $brokers = DB::table('brokers')->where('organization_id', whichUser()->mask)->get();
        return view('brokers.list', compact('brokers'));
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), ['name' => 'required', 'email' => 'required|email|unique:brokers', 'phone' => 'required',])->validate();

        $password = Str::random(8);
        $request['password'] = Hash::make($request->password);
        $request['created_at'] = Carbon::now()->toDateTimeString();
        $request['mask'] = Str::orderedUuid();
        $request['organization_id'] = whichUser()->mask;
        $request['password'] = $password;

        DB::table('brokers')->insert($request->except(['_token']));
        $creds = (object)['email' => $request->email, 'password' => $password];
        sendAccCredentials($creds);

        return redirect(route('org.broker.list'))->with('success', 'Account created!');
    }

    public function add()
    {
        return view('brokers.register');
    }

    public function edit($broker)
    {
        $broker = DB::table('brokers')->where('mask', $broker)->first();

        return view('brokers.update', compact('broker'));
    }

    public function saveUpdate(Request $request, $broker)
    {
        DB::table('brokers')->where('mask', $broker)->update(['name' => $request->name, 'phone' => $request->phone, 'email' => $request->email]);

        return redirect(route('org.broker.list'))->with('success', "Broker details updated!");
    }


    public function delete($broker)
    {

        DB::table('brokers')->where('organization_id', whichUser()->mask)->where('mask', $broker)->delete();

        return redirect(route('org.broker.list'))->with('success', 'Account deleted!');
    }

    public function show($broker)
    {
        $broker = DB::table('brokers')->where('mask', $broker)->first();

        return view('brokers.details', compact('broker'));
    }

    public function loginAs(Request $request, $broker)
    {
        $request->session()->put('old_user_id', Auth::user()->mask);
        $request->session()->put('old_guard', auth()->guard()->name);
        $request->session()->put('user_id', $broker);
        $request->session()->put('guard', 'brokers');

        $user = DB::table('brokers')->where('mask', $broker)->first(['id']);

        Auth::guard('brokers')->loginUsingId($user->id);

        return redirect(route('broker.overview'));
    }
}
