<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ChatsController extends Controller
{
    use ResponseTrait;

    public function index(Request $request){
        return view('chat',compact('request'));
    }

    public function searchUser(Request $request)
    {
       dd(whichUser($request->header('guard')));

        Validator::make($request->all(), ['search' => 'required'])->validate();

        $res = [];

        $drivers = DB::table('drivers')->where('name', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->limit(3)->get(['mask', 'name']);
        foreach ($drivers as $driver) {
            $driver->from = 'drivers';
            array_push($res, $driver);
        }

        $organizations = DB::table('organizations')->where('name', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->limit(3)->get(['mask', 'name']);
        foreach ($organizations as $organization) {
            $organization->from = 'organizations';
            array_push($res, $organization);
        }

        $brokers = DB::table('brokers')->where('name', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->limit(3)->get(['mask', 'name']);
        foreach ($brokers as $broker) {
            $broker->from = 'brokers';
            array_push($res, $broker);
        }

        return $this->successResponse('',$res);
    }

    public function userMessages(Request $request){
        $chats = DB::table('chat_participants')->where('user_id',whichUser($request->header('guard'))->mask)
        ->join('chats','chats.mask','chat_participants.chat_id')
        ->select('chat_participants.user_id','chat_participants.user_type','chat_participants.chat_id')
        ->get();

        return $this->successResponse('',$chats);
    }

    public function startChat(Request $request){
        $participant_chats = DB::table('chat_participants')->where('user_id',$request->user)->get();

        foreach($participant_chats as $participant){
            $participants = DB::table('chat_participants')->where('chat_id',$participant->chat_id)->get();

        }

    }
}
