<?php

namespace App\Http\Controllers;

use Reflector;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Livewire\Broker\CreateShipment;

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
        $sender = DB::table('senders')->where('mask', $load->sender_id)->first();
        $user = auth()->guard()->name;
// dd($sender);
        return view('load.senders.details', compact('load', 'subload', 'user', 'sender'));
    }

    // Sender
    public function s_index()
    {

        $loads = DB::table('loads')->where('sender_id', Auth::user()->mask)->get();

        return view('load.senders.list', compact('loads'));
    }

    public function board()
    {
        $loads = DB::table('loads')->join('senders', 'senders.mask', 'loads.sender_id')->select('senders.name', 'loads.*')->orderByDesc('created_at')->get();

        return view('organization.loads.board', compact('loads'));
    }

    public function completed($load)
    {
        DB::table('loads')->where('sender_id', whichUser()->mask)->where('mask', $load)->update(['completed' => 1, 'status' => "Completed"]);

        return redirect()->back()->with('success', "Load marked as completed");
    }

    public function brokerLoadAssign(Request $request)
    {
        foreach ($request->loads as $load) {
            DB::table("loads")->where('mask', $load)->where('shipment_status', "Unassigned")->update(['organization_id' => $request->organization_id, 'org_assigned_by' => whichUser()->mask]);
        }

        if ($request->shipment == 'yes') {
            // dd("her");
            // return (new CreateShipment)->render($request);
            return redirect(route('broker.shipment.create', $request->all()));
            // return (new ShipmentsController)->create($request);
        }

        return back()->with('success', "Loads assigned successfully");
    }

    public function orgLoadAssign(Request $request)
    {
        Validator::make($request->all(), ['loads' => 'required'], ['loads' => "Select loads to assign"])->validate();

        foreach ($request->loads as $load) {
            DB::table("loads")->where('mask', $load)->where('shipment_status', "Unassigned")->update(['organization_id' => $request->organization_id, 'org_assigned_by' => null]);
        }

        // dd(whichUser()->getTable());
        if ($request->shipment == 'yes') {
            // return (new CreateShipment)->render($request);
            return redirect(route('org.shipment.create', $request->all()));
            // return (new ShipmentsController)->create($request);
        }

        return back()->with('success', "Loads assigned successfully");
    }

    public function add()
    {
        $loads = DB::table('load_types')->get(['id', 'name']);

        $senders =  DB::table('senders')->get(['mask', 'name']);

        $subload = [];

        return view('load.add', compact('loads', 'senders','subload'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // dd($this->subload);
        // $this->load['image'] = $this->image;
        $validated = Validator::make($request->all(), [
            'sender_id' => 'required',
            'length' => 'required|numeric',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'status' => 'required',
            'breadth' => 'required|numeric',
            'insurance_docs' => 'required|mimes:pdf,docx,doc',
            'image' => 'required|mimes:png,jpg,jpeg',
            'other_docs' => 'required|mimes:pdf,docx,doc',
            'pickup_address' => 'required',
            'dropoff_address' => 'required',
        ])->validate();

        $load_id = generateNumber();

        $imagename = uniqid() . '.' . $request->image->getClientOriginalExtension();
        $request->image->storeAs('loads', $imagename, 'real_public');

        $ins = uniqid() . '.' . $request->insurance_docs->getClientOriginalExtension();
        $request->insurance_docs->storeAs('loads', $ins, 'real_public');

        $oth = uniqid() . '.' . $request->other_docs->getClientOriginalExtension();
        $request->other_docs->storeAs('loads', $oth, 'real_public');

        $request['image'] = $imagename;
        $request['insurance_docs'] = $ins;
        $request['other_docs'] = $oth;
        $request['mask'] = $load_id;
        $request['created_at'] = Carbon::now()->toDateTimeString();
        $request['pickup_address'] = json_encode(getPlaceCoordinates($request->pickup_address));
        $request['dropoff_address'] = json_encode(getPlaceCoordinates($request->dropoff_address));

        DB::table('loads')->insert($request->except(['subload', '_token']));

        if ($request->has('subload')) {

            foreach ($request->subload as $load) {
                $load['load_id'] = $load_id;
                $load['created_at'] = Carbon::now()->toDateTimeString();
                DB::table('sub_loads')->insert($load);
            }
        }

        return redirect(route('loads'));
    }

    public function location(Request $request)
    {

        return lookupLocation($request->search);
    }

    public function mark_delivered($load_id)
    {
        DB::table('loads')->where('mask', $load_id)->update(['shipment_status' => "Delivered"]);

        return back()->with('success', 'Load marked as delivered');
    }
}
