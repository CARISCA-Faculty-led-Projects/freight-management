<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Broker\CreateShipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Reflector;

class LoadsController extends Controller
{
    public function index()
    {

        $loads = DB::table('loads')->get();

        return view('load.list', compact('loads'));
    }


    public function edit()
    {
        return view('load.edit');
    }

    public function delete($load_id)
    {

        DB::table('loads')->where('mask', $load_id)->delete();
        DB::table('sub_loads')->where('load_id', $load_id)->delete();

        return back()->with('success', "Load Deleted");
    }

    public function details($load_id)
    {
        $load = DB::table('loads')->where('mask', $load_id)->first();
        $subload = DB::table('sub_loads')->where('load_id', $load_id)->get();
        $sender = DB::table('senders')->where('mask',$load->sender)->first();
        $user = auth()->guard()->name;

        return view('load.details', compact('load', 'subload','user','sender'));
    }

    // Sender
    public function s_index()
    {

        $loads = DB::table('loads')->where('sender_id', Auth::user()->mask)->get();

        return view('load.senders.list', compact('loads'));
    }

    public function board()
    {
        $loads = DB::table('loads')->join('senders','senders.mask','loads.sender_id')->select('senders.name','loads.*')->orderByDesc('created_at')->get();

        return view('organization.loads.board', compact('loads'));
    }

    public function completed($load)
    {
        DB::table('loads')->where('sender_id', whichUser()->mask)->where('mask', $load)->update(['completed' => 1]);

        return redirect()->back()->with('success', "Load marked as completed");
    }

    public function brokerLoadAssign(Request $request)
    {
        foreach ($request->loads as $load) {
            DB::table("loads")->where('mask', $load)->where('shipment_status',"Unassigned")->update(['organization_id' => $request->organization_id,'org_assigned_by'=> whichUser()->mask]);
        }

        if($request->shipment == 'yes'){
            // dd("her");
            // return (new CreateShipment)->render($request);
            return redirect(route('broker.shipment.create',$request->all()));
            // return (new ShipmentsController)->create($request);
        }

        return back()->with('success',"Loads assigned successfully");
    }

    public function mark_delivered($load_id){
        DB::table('loads')->where('mask',$load_id)->update(['shipment_status'=>"Delivered"]);

        return back()->with('success','Load marked as delivered');
    }
}
