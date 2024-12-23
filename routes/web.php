<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TicketController;

Route::resource('tenants', TenantController::class);
Route::resource('payments', PaymentController::class);
Route::resource('tickets', TicketController::class);

Route::get('/', function () {
    return view('welcome');
});
