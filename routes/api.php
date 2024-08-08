<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoadsController;
use App\Http\Controllers\Api\ChatsController;
use App\Http\Controllers\Api\DriversController;
use App\Http\Controllers\Api\ShipmentsController as ApiShipmentsController;
use App\Http\Controllers\ShipmentsController;

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

// Route::middleware('auth.general')->group(function () {
Route::prefix('v1')->group(function () {
    Route::get('location/search', [LoadsController::class, 'location']);
    Route::controller(ChatsController::class)->group(function () {
        Route::post('search-user', 'searchUser');
    });
    Route::post('send-location', [ShipmentsController::class, 'curr_location']);


    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login');
        Route::post('register', 'register');
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('driver')->group(function () {
            Route::controller(ApiShipmentsController::class)->group(function () {
                Route::get('shipments', 'driver_shipments');
                Route::prefix('shipment/{shipment}')->group(function () {
                    Route::get('view', 'viewShipment');
                    Route::get('loads', 'viewShipmentLoads');
                    Route::get('start-shipment', 'start_shipment');
                    Route::get('cancel-shipment', 'cancel_shipment');
                });
            });
            Route::prefix('profile')->group(function () {
                Route::controller(DriversController::class)->group(function () {
                    Route::get('/', 'profile');
                });
            });
        });
    });
});
// });
