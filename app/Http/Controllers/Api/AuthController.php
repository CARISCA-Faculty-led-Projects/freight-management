<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Driver;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use ResponseTrait;
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), ['type' => ['required', Rule::in('drivers', 'senders')], 'email' => 'required|email', 'password' => 'required']);

        if ($validator->fails()) {
            return $this->validationResponse($validator->errors());
        }

        if (Auth::guard($request->type)->attempt(['email' => $request->email, 'password' => $request->password])) {
            $driver = Driver::where('email',$request->email)->first();
            $user = [
                'type' => $request->type,
                'token' => $driver->createToken($request->email,['type:'.$request->type])->plainTextToken
            ];
            return $this->successResponse('',$user);
        } else {
            return $this->errorResponse('Email or Password incorrect or wrong user type selected');
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), ['type' => ['required', Rule::in('drivers', 'senders')], 'name' => 'required', 'email' => 'required|email', 'phone' => 'required', 'password' => 'required']);

        if ($validator->fails()) {
            return $this->validationResponse($validator->errors());
        }

        $request['password'] = Hash::make($request->password);
        $request['created_at'] = Carbon::now()->toDateTimeString();
        $request['mask'] = Str::orderedUuid();
        $request['status'] = "Approved";

        DB::table($request->type)->insert($request->except(['type']));

        sendMail("Account Created", $request->email, "Your account has been created and pending review.");
        sendAdminMessage("Account Created", "An account has been created. Log in to your dashboard and approve account");

        return $this->successResponse('Account created successfully');
    }
}
