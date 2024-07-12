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

        $loads = DB::table('loads')->orderByDesc('created_at')->get();

        return view('load.list', compact('loads'));
    }

    public function overview(){
        $loads = DB::table('loads')->where('organization_id',whichUser()->mask)
        ->join('senders','senders.mask','loads.sender_id')
        ->get(['senders.name as sender','loads.image','loads.pickup_address','loads.dropoff_address'])->toArray();

        return view('load.overview',compact('loads'));
    }


    public function edit()
    {
        return view('load.edit');
    }

    public function delete($load_id)
    {

        $load = DB::table('loads')->where('mask', $load_id);;
        unlink('storage/loads/' . $load->first()->image);
        $load->delete();
        DB::table('sub_loads')->where('load_id', $load_id)->delete();

        return back()->with('success', "Load Deleted");
    }

    public function details($load_id)
    {
        $load = DB::table('loads')->where('mask', $load_id)->first();
        $subload = DB::table('sub_loads')->where('load_id', $load_id)->get();
        $sender = DB::table('senders')->where('mask', $load->sender_id)->first();
        $user = auth()->guard()->name;

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

        return view('load.add', compact('loads', 'senders', 'subload'));
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'sender_id' => 'required',
            'length' => 'required|numeric',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'status' => 'required',
            'budget' => 'required|numeric',
            'breadth' => 'required|numeric',
            'insurance_docs' => 'required|mimes:pdf,docx,doc',
            'image' => 'required|mimes:png,jpg,jpeg',
            // 'other_docs' => 'required|mimes:pdf,docx,doc',
            'pickup_address' => 'required',
            'dropoff_address' => 'required',
        ])->validate();

        $load_id = generateNumber();
        $oth = null;

        $imagename = uniqid() . '.' . $request->image->getClientOriginalExtension();
        $request->image->storeAs('loads', $imagename, 'real_public');

        $ins = uniqid() . '.' . $request->insurance_docs->getClientOriginalExtension();
        $request->insurance_docs->storeAs('loads', $ins, 'real_public');

        if (is_file($request->other_docs)) {
            $oth = uniqid() . '.' . $request->other_docs->getClientOriginalExtension();
            $request->other_docs->storeAs('loads', $oth, 'real_public');
        }

        $req['image'] = $imagename;
        $req['insurance_docs'] = $ins;
        $req['other_docs'] = $oth;
        $req['mask'] = $load_id;
        $req['status'] = $request->status;
        $req['sender_id'] = $request->sender_id;
        $req['load_type'] = $request->load_type;
        $req['description'] = $request->description;
        $req['quantity'] = $request->quantity;
        $req['handling'] = $request->handling;
        $req['weight'] = $request->weight;
        $req['length'] = $request->length;
        $req['breadth'] = $request->breadth;
        $req['budget'] = $request->budget;
        $req['height'] = $request->height;
        $req['organization_id'] = whichUser()->mask;
        $req['created_at'] = Carbon::now()->toDateTimeString();
        $req['pickup_address'] = json_encode(getPlaceCoordinates($request->pickup_address));
        $req['dropoff_address'] = json_encode(getPlaceCoordinates($request->dropoff_address));

        DB::table('loads')->insert($req);

        if ($request->has('subload')) {

            foreach ($request->subload as $load) {
                $load['load_id'] = $load_id;
                $load['created_at'] = Carbon::now()->toDateTimeString();
                DB::table('sub_loads')->insert($load);
            }
        }

        return redirect(route('loads'));
    }

    public function s_store(Request $request)
    {

        $validated = Validator::make($request->all(), [
            'length' => 'required|numeric',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'breadth' => 'required|numeric',
            'insurance_docs' => 'required|mimes:pdf,docx,doc',
            'image' => 'required|mimes:png,jpg,jpeg',
            'other_docs' => 'nullable|mimes:pdf,docx,doc',
            'handling' => 'required'
        ])->validate();


        $load_id = generateNumber();

        $imagename = uniqid() . '.' . $request->image->getClientOriginalExtension();
        $request->image->storeAs('loads', $imagename, 'real_public');

        $ins = uniqid() . '.' . $request->insurance_docs->getClientOriginalExtension();
        $request->insurance_docs->storeAs('loads', $ins, 'real_public');

        $oth = null;
        if (is_file($request->other_docs)) {
            $oth = uniqid() . '.' . $request->other_docs->getClientOriginalExtension();
            $request->other_docs->storeAs('loads', $oth, 'real_public');
        }

        $req = [];

        $req['image'] = $imagename;
        $req['insurance_docs'] = $ins;
        $req['other_docs'] = $oth;
        $req['mask'] = $load_id;
        $req['status'] = "Pending";
        $req['shipment_status'] = "Unassigned";
        $req['load_type'] = $request->load_type;
        $req['sender_id'] = whichUser()->mask;
        $req['description'] = $request->description;
        $req['quantity'] = $request->quantity;
        $req['handling'] = $request->handling;
        $req['weight'] = $request->weight;
        $req['length'] = $request->length;
        $req['breadth'] = $request->breadth;
        $req['budget'] = $request->budget;
        $req['height'] = $request->height;
        $req['created_at'] = Carbon::now()->toDateTimeString();
        $req['pickup_address'] = json_encode(getPlaceCoordinates($request->pickup_address));
        $req['dropoff_address'] = json_encode(getPlaceCoordinates($request->dropoff_address));
        DB::table('loads')->insert($req);

        if ($request->has('subload')) {
            foreach ($request->subload as $load) {
                $load['load_id'] = $load_id;
                $load['created_at'] = Carbon::now()->toDateTimeString();
                DB::table('sub_loads')->insert($load);
            }
        }

        return redirect(route('sender.loads'));
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

    public function update(Request $request, $load_id)
    {
        $validated = Validator::make($request->all(), [
            'sender_id' => 'required'
        ])->validate();

        $load = DB::table('loads')->where('mask', $load_id)->first();

        if (is_file($request->image)) {
            if (file_exists('storage/loads/' . $load->image)) {
                unlink('storage/loads/' . $load->image);
            }
            $imagename = uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('loads', $imagename, 'real_public');
            $req['image'] = $imagename;
        }

        if (is_file($request->insurance_docs)) {
            if (file_exists('storage/loads/' . $load->insurance_docs)) {
                unlink('storage/loads/' . $load->insurance_docs);
            }
            $ins = uniqid() . '.' . $request->insurance_docs->getClientOriginalExtension();
            $request->insurance_docs->storeAs('loads', $ins, 'real_public');
            $req['insurance_docs'] = $ins;
        }

        if (is_file($request->other_docs)) {
            if (file_exists('storage/loads/' . $load->other_docs)) {
                unlink('storage/loads/' . $load->other_docs);
            }
            $oth = uniqid() . '.' . $request->other_docs->getClientOriginalExtension();
            $request->other_docs->storeAs('loads', $oth, 'real_public');
            $req['other_docs'] = $oth;
        }

        $req['status'] = $request->status;
        $req['sender_id'] = $request->sender_id;
        $req['load_type'] = $request->load_type;
        $req['description'] = $request->description;
        $req['quantity'] = $request->quantity;
        $req['handling'] = $request->handling;
        $req['weight'] = $request->weight;
        $req['length'] = $request->length;
        $req['breadth'] = $request->breadth;
        $req['budget'] = $request->budget;
        $req['height'] = $request->height;
        $req['updated_at'] = Carbon::now()->toDateTimeString();

        if (gettype(json_decode($request->pickup_address)) == "NULL") {
            $req['pickup_address'] = json_encode(getPlaceCoordinates($request->pickup_address));
        }
        if (gettype(json_decode($request->dropoff_address)) == "NULL") {
            $req['dropoff_address'] = json_encode(getPlaceCoordinates($request->dropoff_address));
        }

        DB::table('loads')->where('mask', $load_id)->update($req);

        if ($request->subload != null) {
            foreach ($request->subload as $sload) {
                if (array_key_exists('id', $sload)) {
                    $this->subload['updated_at'] = Carbon::now()->toDateTimeString();
                    DB::table('sub_loads')->where('load_id', $sload['load_id'])->where('id', $sload['id'])->update($sload);
                } else {
                    dd($sload);
                    $sload['load_id'] = $load_id;
                    $sload['created_at'] = Carbon::now()->toDateTimeString();
                    DB::table('sub_loads')->insert($sload);
                }
            }
        }

        if (whichUser()->getTable() == 'senders') {
            return redirect(route('sender.loads'));
        } else {
            return redirect(route('org.load.board'))->with('success', "Edit successful");
        }
    }
}
