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

    public function details($organization){
        $org_details = DB::table('organizations')->where('id',$organization)->first();

        $org_routes = DB::table('routes')->where('organization_id',$organization)->get();

        return view('organization.details',compact('org_details','org_routes'));
    }
}
