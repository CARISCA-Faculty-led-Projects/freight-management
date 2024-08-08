<?php

namespace App\Helpers;

use App\Traits\ResponseTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class Paystack
{
    use ResponseTrait;

    private function stateUrl($state){
        if($state == 'live'){
            return '';
        }else{
            return 'sandbox.';
        }
    }
    private function initiate($data, $state = 'live')
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => "Bearer ".env("PAYSTACK_KEY"),
            'Content-Type' => "application/json"
        ])->post('https://api.paystack.co/transaction/initialize', [
            'email' => $data['email'],
            'amount' => $data['amount'] * 100,
            'currency' => 'GHS',
            'callback_url' => env("APP_URL").'/load/payment-success',
            'reference' => $data['order_id']
        ])->throw()->json();

        return $response;
    }

    public function checkout($data, $state = 'live')
    {
        $initiateRes = $this->initiate($data, $state);

        return $initiateRes['data'];
    }

    public function verify($reference){
        try {
            $response = Http::withHeaders([
                'Authorization' => "Bearer ".env('PAYSTACK_KEY'), //  sk_test_4bc1809fcd590182ee672518e204a0a796acd48b
            ])->get('https://api.paystack.co/transaction/verify/' . $reference)->throw()->json();
        } catch (Exception $e) {
            return ['data'=>['status'=>'error','gateway_response'=>"Transaction not found"]];
            // dd($e->getMessage());
        }
            return $response;
    }

    public function recurring($data)
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => "Bearer ".env("PAYSTACK_KEY"),
            'Content-Type' => "application/json"
        ])->post('https://api.paystack.co/transaction/charge_authorization', [
            'authorization_code' => $data['auth'],
            'email' => $data['email'],
            'amount' => $data['amount'] * 100
        ])->throw()->json();

        return $response;
    }
}
