<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ShipmentsController extends Controller
{
    public function schedule()
    {
        return view('shipments.schedule');
    }

    public function list()
    {
        $shipments = DB::table('shipments')->where('organisation_id', whichUser()->mask)->get();
        return view('shipments.list', compact('shipments'));
    }

    public function add()
    {

        $loads = DB::table('loads')->get();
        $load_types = DB::table('load_types')->get();

        $senders = DB::table('senders')->get(['name', 'phone', 'mask']);
        $drivers = DB::table('drivers')->where('organization_id', whichUser()->mask)->get(['name', 'phone', 'mask']);

        return view('shipments.add', compact('loads', 'load_types', 'senders', 'drivers'));
    }

    public function create(Request $request)
    {
        $loads = [];

        foreach($request->loads as $load){
            $tmpload = DB::table('loads')->where('mask',$load)->first();
            array_push($loads,$tmpload);
        }

        $drivers = DB::table('drivers')->where('organization_id', whichUser()->mask)->get(['name', 'phone', 'mask']);

        return view('organization.loads.create-shipment', compact('loads', 'drivers'));
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), ['sender_id' => 'required', 'load_type' => 'required', 'driver_id' => 'required', 'amount' => 'required'])->validate();

        $request['created_at'] = Carbon::now()->toDateTimeString();
        $request['mask'] = generateNumber();
        $request['organisation_id'] = whichUser()->mask;

        $request['loads'] = json_encode($request->loads);
        // dd($request->all());
        DB::table('shipments')->insert($request->except(['_token', 'condition_label', 'conditions', 'condition_equals', 'condition_type']));

        return redirect(route('shipments.list'))->with('success', 'Shipments details saved');
    }
}
