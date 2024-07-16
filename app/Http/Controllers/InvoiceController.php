<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function view($load)
    {
        $load = DB::table('loads')->where('loads.mask', $load)
            ->join('senders', 'senders.mask', 'loads.sender_id')
            ->join('organizations', 'organizations.mask', 'loads.organization_id')
            ->select(
                'senders.name as sender_name',
                'senders.phone as sender_phone',
                'senders.address as sender_address',
                'senders.email as sender_email',
                'loads.*',
                'organizations.name as organization_name',
                'organizations.phone as organization_phone',
                'organizations.address as organization_address'
            )
            ->first();
        return view('load.invoices.view', compact('load'));
    }
}
