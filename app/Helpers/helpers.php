<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

function generateAccNumber()
{
    $code = 0;
    do {
        $code = mt_rand(00000000, 93840098);
    } while (strlen($code) < 8);
    return $code;
}

function generateTaxnNumber()
{
    $code = 0;
    do {
        $code = mt_rand(0000, 9999);
    } while (strlen($code) < 4);
    return $code;
}

function generateNumber()
{
    $code = 0;
    do {
        $code = mt_rand(00000000, 99990000);
    } while (strlen($code) < 8);
    return $code;
}

function whichUser()
{
    // dd(Auth::user());

    $guards = array_keys(config('auth.guards'));
    foreach ($guards as $guard) {
        if (Auth::guard($guard)->check() && session('user_id') != null) {
            $level = DB::table($guard != 'web' ? $guard : "users")->where('mask', session('user_id'))->first();
            return $level;
        } else if (Auth::guard($guard)->check()) {
            return Auth::guard($guard)->user();
        }
    }
    // $user = session('user_id') == null ? Auth::user()->mask : session('user_id');
    // $guard = 'web';

    // if (auth()->guard()->name != "web") {
    //     $guard = auth()->guard()->name;
    // }

    // $level = DB::table($guard != 'web' ? $guard : "users")->where('mask', $user)->first();
    // return $level;
}

function lookupLocation($location)
{
    try {
        $response = Http::get('https://maps.googleapis.com/maps/api/place/autocomplete/json?components=country:gh&key=' . env('MAP_API') . '&input=' . $location)->throw()->json();
        return $response['predictions'];
    } catch (Exception $e) {
        // return ['data'=>['status'=>'error','gateway_response'=>"Transaction not found"]];
        dd($e->getMessage());
    }
}

function getPlaceCoordinates($place)
{
    $location = [
        'name'=> null,
        'location' => null
    ];

    try {
        $response = Http::get('https://maps.googleapis.com/maps/api/place/details/json?key=' . env('MAP_API') . '&place_id=' . $place)->throw()->json();
        $location['name'] = $response['result']['name'];
        $location['location'] = $response['result']['geometry']['location'];
        return $location;
    } catch (Exception $e) {
        // return ['data'=>['status'=>'error','gateway_response'=>"Transaction not found"]];
        dd($e->getMessage());
    }
}

function sendMail($subject, $email, $msg)
{
    Mail::send('emails.provider_notification', ["msg" => $msg], function ($message) use ($email) {
        $message->to($email)->subject("PREMIUM DOCUMENTS REQUESTED")->from(env('MAIL_FROM_ADDRESS'), "SENDIN");
    });
}

function sendRegisteredMail()
{
}

function sendDriverShipmentAssignmentMail()
{
}
