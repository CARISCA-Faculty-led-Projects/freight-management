<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function dashboard()
    {
        $settings = DB::table('settings')->first();
        $account = DB::table('system_account')->first();

        $orgs = DB::table('organizations')->where('status', "Approved")->count();
        $drivers = DB::table('drivers')->where('status', "Approved")->count();
        $brokers = DB::table('brokers')->where('status', "Approved")->count();
        $senders = DB::table('senders')->where('status', "Approved")->count();

        $shipments = DB::table('shipments')->count();

        return view('admin.dashboard', compact("settings", 'account', 'orgs', 'drivers', 'brokers', 'senders', 'shipments'));
    }

    public function profile()
    {


        return view('admin.details');
    }

    public function loginAs(Request $request)
    {
        $request->session()->put('old_user_id', Auth::user()->mask);
        $request->session()->put('old_guard', auth()->guard()->name);
        $request->session()->put('user_id', $request->mask);
        $request->session()->put('guard', $request->type);

        $user = DB::table($request->type)->where('mask', $request->mask)->first(['id']);

        Auth::guard($request->type)->loginUsingId($user->id);

        $type = rtrim($request->type, 's');
        return redirect(route(($type == 'organization' ? 'org' : $type) . '.overview'));
    }

    public function settings()
    {
        $settings = DB::table('settings')->first();
        return view('settings.index',compact('settings'));
    }

    public function updateSetting(Request $request)
    {
        DB::table('settings')->update($request->except(['_token']));

        return back()->with('success','Settings updated');
    }
}
