<?php

namespace App\Http\Controllers;

use App\Helpers\Paystack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PaymentsController extends Controller
{
    //

    public function make_load_payment($load_id)
    {
        $sender = DB::table('senders')->where('mask', whichUser()->mask)->first();

        $load = DB::table('loads')->where('mask', $load_id)->first();
        $order_id = generateNumber();

        $data = [
            'email' => $sender->email,
            'amount' => $load->price,
            'order_id' => $order_id
        ];

        DB::table('load_payments')->insert(['order_id' => $order_id, 'load_id' => $load_id, 'amount' => $load->price]);
        $response = (new Paystack)->checkout($data);
        return $response['authorization_url'];
    }

    public function check_load_payment()
    {
        // DB::table('loads')->where('mask', $load_id)->update(['payment_status' => "Paid"]);

        return redirect(route('sender.loads'))->with('success', "Load ");
    }
}
