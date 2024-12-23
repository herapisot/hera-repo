<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\HomeController;

Route::resource('tenants', TenantController::class);
Route::resource('payments', PaymentController::class);
Route::resource('tickets', TicketController::class);
Route::get('/', [HomeController::class, 'index']);
// Route::get('/', function () {
//     return view('welcome');
// });
