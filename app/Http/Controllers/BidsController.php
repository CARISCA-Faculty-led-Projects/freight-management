<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BidsController extends Controller
{
    public function sender_bids()
    {
        $bids = DB::table('bids')->where('bids.sender_id', whichUser()->mask)
            ->join('loads', 'loads.mask', 'bids.load_id')
            ->select('loads.mask', 'bids.*', 'loads.budget', 'loads.price')
            ->orderByDesc('created_at')
            ->get();
        foreach ($bids as $bid) {
            $bid_history = DB::table('bids_history')->where('bid_id', $bid->id)->orderByDesc('created_at')->first('offer_from');

            if ($bid->broker_id != null) {
                $broker = DB::table('brokers')->where('mask', $bid->broker_id)->first(['name', 'organization_id']);
                $bid->broker = $broker->name;
                // dd($broker->organization_id);
                if (array_key_exists('organization_id', (array)$broker)) {
                    $org = DB::table("organizations")->where('mask', $broker->organization_id)->first(['name']);
                    $bid->broker_organization = $org->name;
                }
            } else {
                $bid->broker = null;
                $bid->broker_organization = null;
            }

            if ($bid_history) {
                $bid->last_offer_from = $bid_history->offer_from;
            } else {
                $bid->last_offer_from = null;
            }
        }
        return view('load.senders.bids', compact('bids'));
    }

    public function index()
    {
        $bids = DB::table('bids')->where('broker_id', whichUser()->mask)->orWhereNull('broker_id')
            ->join('loads', 'loads.mask', 'bids.load_id')
            ->join('senders', 'senders.mask', 'loads.sender_id')
            ->select('senders.name as sender', 'senders.phone as sender_phone', 'loads.price', 'loads.organization_id', 'loads.payment_status', 'loads.budget', 'bids.*')
            ->orderByDesc('created_at')
            ->get();

        foreach ($bids as $bid) {
            $bid_history = DB::table('bids_history')->where('bid_id', $bid->id)->orderByDesc('created_at')->first('offer_from');
            if ($bid_history) {
                $bid->last_offer_from = $bid_history->offer_from;
            } else {
                $bid->last_offer_from = null;
            }
        }

        return view('load.bids', compact('bids'));
    }

    public function start_bid(Request $request)
    {

        if (whichUser()->getTable() == 'brokers') {
            DB::table('bids')->where('id', $request->bid_id)->whereNull('broker_id')->update(['broker_id' => whichUser()->mask, 'status' => 'Pending']);
            DB::table('loads')->where('mask', $request->load_id)->update(['org_assigned_by' => whichUser()->mask]);
        }
        DB::table('bids_history')->insert([
            'bid_id' => $request->bid_id,
            'offer_from' => whichUser()->getTable(),
            'user_id' => whichUser()->mask,
            'offer' => $request->offer,
            'message' => $request->message,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        return back()->with('success', 'Offer on bid sent');
    }

    public function make_offer(Request $request)
    {
        Validator::make($request->all(), ['offer' => 'required']);

        DB::table('bids_history')->insert([
            'bid_id' => $request->bid_id,
            'offer_from' => whichUser()->getTable(),
            'user_id' => whichUser()->mask,
            'offer' => $request->offer,
            'message' => $request->message,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        return back()->with('success', 'Offer on bid sent');
    }

    public function logs($load_id)
    {
        $agreeBtn = false;
        $load = DB::table('loads')->where('mask', $load_id)->first();
        $bid = DB::table('bids')->where('load_id', $load_id)->first();
        $sender = DB::table('senders')->where('mask', $load->sender_id)->first(['name', 'phone']);
        $bid_history = DB::table('bids_history')->where('bid_id', $bid->id)->orderByDesc('created_at')->get();
        $recent = $bid_history[0];
        if ($recent->offer_from != whichUser()->getTable()) {
            $agreeBtn = true;
        }

        

        return view('load.bid_logs', compact('load', 'bid', 'bid_history', 'agreeBtn', 'recent'));
    }

    public function acceptOffer($load_id)
    {
        $bid = DB::table('bids')->where('load_id', $load_id);
        $bid_history = DB::table('bids_history')->where('bid_id', $bid->first()->id)->orderByDesc('created_at')->first();
        DB::table('loads')->where('mask', $load_id)->update(['status' => 'Completed', 'price' => $bid_history->offer]);
        $bid->update(['status' => 'Completed']);

        return back()->with('success', 'Bidding completed');
    }
}
