<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizationsController extends Controller
{
    public function index(){
        $organizations = DB::table('organizations')->get();

        return view('organization.list',compact('organizations'));
    }
}
