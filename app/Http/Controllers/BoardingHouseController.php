<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Payment;
use App\Notifications\EmailNotification;
use Carbon\Carbon;

class BoardingHouseController extends Controller
{
    /**
     * Display a listing of tenants.
     *
     * @return \Illuminate\Http\Response
     */
    public function tenantsList()
    {
        $tenants = Tenant::all();
        return view('tenants.index', compact('tenants'));
    }

    /**
     * Track payments of a tenant.
     *
     * @param int $tenantId
     * @return \Illuminate\Http\Response
     */
}