<?php

use App\Http\Controllers\Customer\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['token'])->group(function () {
    Route::post('/customer/store', [CustomerController::class, 'storeCustomer']);
    Route::get('/customer/show/{iCustomerId}', [CustomerController::class, 'showCustomer']);
});


