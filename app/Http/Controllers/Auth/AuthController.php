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
        Validator::make($request->all(), ['name' => 'required', 'email' => 'required|email|unique:' . $request->type, 'phone' => 'required', 'password' => 'required', 'confirm-password' => 'required|same:password'], ['confirm-password' => "Password fields do not match"])->validate();

        $request['password'] = Hash::make($request->password);
        $request['created_at'] = Carbon::now()->toDateTimeString();
        $request['mask'] = Str::orderedUuid();
        $request['status'] = "Approved";

        DB::table($request->type)->insert($request->except(['_token', 'type', 'confirm-password']));

        // sendMail("Account Created", $request->email, "Your account has been created and pending review.");
        // sendAdminMessage("Account Created", "An account has been created. Log in to your dashboard and approve account");

        return redirect(route('login'))->with('success', 'Account created!');
    }

    public function authenticate(Request $request)
    {
        Validator::make($request->all(), ['email' => 'required|email', 'password' => 'required'])->validate();

        if (Auth::guard($request->type)->attempt(['email' => $request->email, 'password' => $request->password])) {
            $logged = Carbon::now()->toDateTimeString();
            $user = DB::table($request->type)->where('email', $request->email);

            DB::table('login_activity')->insert([
                'type' => $request->type, 'mask' => $user->first()->mask, 'created_at' => $logged
            ]);
            $user->update(['last_login' => $logged]);

            if ($request->type == "senders") {
                return redirect(route("sender.overview"));
            } else if ($request->type == "organizations") {
                return redirect(route("org.overview"));
            } else if ($request->type == "brokers") {
                return redirect(route('broker.overview'));
            } else if ($request->type == "drivers") {
                return redirect(route("driver.overview"));
            }
        } else {
            return redirect()->back()->with("error", "Email / Password incorrect or different account type selected");
        }
    }

    public function adminLogin()
    {
        return view('auth.admin-login');
    }

    public function adminAuthenticate(Request $request)
    {

        Validator::make($request->all(), ['email' => 'required|email', 'password' => 'required'])->validate();

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect(route("admin.overview"));
        } else {
            return redirect()->back()->with("error", "Email / Password incorrect or different account type selected");
        }
    }

    public function changePass(Request $request)
    {
        Validator::make($request->all(), ['password' => 'required', 'con_password' => 'required|same:password'])->validate();

        DB::table($request->type)->where('mask', $request->user)->update(['password' => Hash::make($request->password)]);

        return back()->with('success', "Password changed successfully");
    }

    public function resetPass(Request $request)
    {
        $new = Str::random(6);

        $user = DB::table($request->type)->where('mask', $request->user);

        $msg = "Your password has been changed. Your new password is " . $new;

        // sendMail("Password Reset", $user->first()->email, $msg);
        $user->update(['password' => Hash::make($new)]);
        return back()->with('success', "Password reset successful");
    }

    public function destroy(Request $request)
    {
        if ($request->session()->has('old_guard')) {
            $guard = session('old_guard');
            $user = DB::table($guard == 'web' ? "users" : $guard)->where('mask', session('old_user_id'))->first(['id']);
            Auth::guard(session('old_guard'))->loginUsingId($user->id);

            if (session('old_guard') == 'organizations') {
                $request->session()->forget(['old_guard', 'old_user_id', 'guard', 'user_id']);

                return redirect(route('org.overview'));
            } else if (session('old_guard') == 'web') {
                $request->session()->forget(['old_guard', 'old_user_id', 'guard', 'user_id']);

                return redirect(route('admin.overview'));
            }
        } else {
            auth()->guard()->logout();
            $request->session()->flush();
            return redirect(route('login'));
        }
    }
}
