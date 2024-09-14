<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoadsController as WebLoadsController;

class LoadsController extends Controller
{
    use ResponseTrait;

    public function delivered($load_id)  {

        $response = (new WebLoadsController)->mark_delivered($load_id);

        return $this->successResponse('Load marked as delivered',);
    }
}
