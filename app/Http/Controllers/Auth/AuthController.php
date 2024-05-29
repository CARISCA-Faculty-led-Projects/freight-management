<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function login()
    {

        return view('auth.login');
    }

    public function register()
    {

        return view('auth.register');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), ['name' => 'required', 'email' => 'required|email', 'phone' => 'required', 'password' => 'required', 'confirm-password' => 'required|same:password'], ['confirm-password' => "Password fields do not match"])->validate();

        $request['password'] = Hash::make($request->password);
        $request['created_at'] = Carbon::now()->toDateTimeString();
        $request['mask'] = Str::orderedUuid();

        DB::table($request->type)->insert($request->except(['_token', 'type', 'confirm-password']));

        return redirect(route('login'))->with('success', 'Account created!');
    }

    public function authenticate(Request $request)
    {
        Validator::make($request->all(), ['email' => 'required|email', 'password' => 'required'])->validate();

        if (Auth::guard($request->type)->attempt(['email' => $request->email, 'password' => $request->password])) {
            if ($request->type == "senders") {
                return redirect(route("sender.overview"));
            } else if ($request->type == "organizations") {
                return redirect(route("org.overview"));
            } else if ($request->type == "brokers") {
                return redirect('brokers/overview');
            } else if ($request->type == "drivers") {
                return redirect(route("driver.overview"));
            }
        } else {
           return redirect()->back()->with("error","Email / Password incorrect or different account type selected");
        }
    }

    public function adminLogin(){
        return view('auth.admin-login');
    }

    public function adminAuthenticate(Request $request){

        Validator::make($request->all(), ['email' => 'required|email', 'password' => 'required'])->validate();

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

                return redirect(route("admin.dashboard"));

        } else {
           return redirect()->back()->with("error","Email / Password incorrect or different account type selected");
        }
    }

    public function destroy(Request $request)
    {
        auth()->guard()->logout();

        $request->session()->flush();

        // dd(auth()->guard());
        return redirect(route('login'));
    }
}
