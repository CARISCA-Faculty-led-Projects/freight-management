<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BrokersController extends Controller
{
    public function overview()
    {

        return view('brokers.overview');
    }

    public function list()
    {
        return view('brokers.list');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), ['name' => 'required', 'email' => 'required|email', 'phone' => 'required', 'password' => 'required'])->validate();

        $request['password'] = Hash::make($request->password);
        $request['created_at'] = Carbon::now()->toDateTimeString();
        $request['mask'] = Str::orderedUuid();

        DB::table($request->type)->insert($request->except(['_token']));

        return back()->with('success', 'Account created!');
    }
}
