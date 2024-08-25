<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

function whichUser($guard = null)
{
    if ($guard) {
        $level = Auth::guard($guard)->user();
        return $level;
    } else {
        $guards = array_keys(config('auth.guards'));
        if (session('guard') != null && session('user_id') != null) {
            $level = Auth::guard(session('guard'))->user();
            return $level;
        } else {
            return Auth::user();
        }
    }
}

function lookupLocation($location)
{
    try {
        $response = Http::get('https://maps.googleapis.com/maps/api/place/autocomplete/json?components=country:gh&key=' . env('MAP_API') . '&input=' . $location)->throw()->json();
        return $response['predictions'];
    } catch (Exception $e) {
        // dd("No internet connection");
        // return dd("No internet connection");
        dd($e->getMessage());
    }
}

function getPlaceCoordinates($place)
{
    $location = [
        'name' => null,
        'location' => null
    ];

    try {
        $response = Http::get('https://maps.googleapis.com/maps/api/place/details/json?key=' . env('MAP_API') . '&place_id=' . $place)->throw()->json();
        $location['name'] = $response['result']['name'];
        $location['location'] = $response['result']['geometry']['location'];
        return $location;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

function getPlaceCoordinatesDistance($pickup, $dropoff)
{
    $location = [];

    try {
        $response = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json?key=' . env('MAP_API') . '&origins=place_id:' . $pickup . '&destinations=place_id:' . $dropoff)->throw()->json();
        $location['distance'] = $response['rows'][0]['elements'][0]['distance']['value'];
        return $location;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

function sendMail($subject, $email, $msg)
{
    Mail::send('emails.general', ["msg" => $msg], function ($message) use ($email, $subject) {
        $message->to($email)->subject($subject)->from(env('MAIL_FROM_ADDRESS'), "CARISCA");
    });
}

function sendAdminMessage($subject, $msg)
{
    $users = DB::table('users')->get(['email']);
    foreach ($users as $user) {
        $email = $user->email;
        Mail::send('emails.general', ["msg" => $msg], function ($message) use ($email, $subject) {
            $message->to($email)->subject($subject)->from(env('MAIL_FROM_ADDRESS'), "CARISCA");
        });
    }
}

function sendAccCredentials($creds)
{
    $email = $creds->email;

    Mail::send('emails.acc-credentials', ["creds" => $creds], function ($message) use ($email) {
        $message->to($email)->subject('Account Credentials')->from(env('MAIL_FROM_ADDRESS'), "CARISCA");
    });
}

function getMonths()
{
    $months = array_map(fn($month) => Carbon::create(null, $month)->format('M'), range(1, 12));
    return $months;
}

function shareLoadPayment($load_id)
{
    $load = DB::table('loads')->where('mask', $load_id)->first(['organization_id', 'org_assigned_by as broker_id', 'price']);

    $settings = DB::table('settings')->first();
    $broker_amount = floor(($settings->brokers_percentage_pl / 100) * $load->price);
    $org_amount = floor(($settings->organizations_percentage_pl / 100) * $load->price);
    $system_amount = floor(($settings->system_percentage_pl / 100) * $load->price);

    DB::table('brokers')->where('mask', $load->broker_id)->increment('balance', $broker_amount);
    DB::table('organizations')->where('mask', $load->organization_id)->increment('balance', $org_amount);
    DB::table('system_account')->increment('balance', $system_amount);
}

function sendRegisteredMail() {}

function sendDriverShipmentAssignmentMail() {}
