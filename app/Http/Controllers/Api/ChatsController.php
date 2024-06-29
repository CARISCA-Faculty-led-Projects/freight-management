<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ChatsController extends Controller
{
    use ResponseTrait;
    public function searchUser(Request $request)
    {
        Validator::make($request->all(), ['search' => 'required'])->validate();

        $res = [];

        $drivers = DB::table('drivers')->where('name', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->limit(3)->get(['mask', 'name']);
        foreach ($drivers as $driver) {
            $driver->from = 'drivers';
            array_push($res, $driver);
        }

        $organizations = DB::table('organizations')->where('name', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->limit(3)->get(['mask', 'name']);
        foreach ($organizations as $organization) {
            $organization->from = 'organizations';
            array_push($res, $organization);
        }

        $brokers = DB::table('brokers')->where('name', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->limit(3)->get(['mask', 'name']);
        foreach ($brokers as $broker) {
            $broker->from = 'brokers';
            array_push($res, $broker);
        }

        return $this->successResponse('',$res);
    }
}
