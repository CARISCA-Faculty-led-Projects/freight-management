<?php

namespace App\Http\Livewire\Load;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class LoadBoard extends Component
{
    public $loads;
    public $tot;

    public function getLoads(){
        $this->loads = (object)DB::table('loads')->where('completed',1)->join('senders','senders.mask','loads.sender_id')->select('loads.*','senders.name')->orderByDesc('created_at')->get();

        foreach($this->loads as $loads){
            if($loads->organization_id){
                $organization = DB::table("organizations")->where('mask',$loads->organization_id)->first('name');
                $loads->organization = $organization->name;
            }else{
                $loads->organization = 'Unassigned';
            }
        }

    }

    public function getOrgs(){
      return DB::table("organizations")->where('status','Approved')->get(['name','mask']);

    }

    public function qty(){
        $this->tot = count($this->loads);
    }

    public function mount(){
        $this->getLoads();

    }

    public function render()
    {
        // dd(whichUser()->getTable());
        if (whichUser()->getTable() == 'brokers') {
            return view('load.board')->extends('layout.roles.broker')->section('content');
        } else {
            return view('load.board')->extends('layout.roles.organization')->section('content');
        }
    }
}
