<?php

use Illuminate\Http\Request;
use OpenSpout\Common\Entity\Row;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoadsController;
use App\Http\Controllers\Api\LoadsController as ApiLoadsController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ChatsController;
use App\Http\Controllers\ShipmentsController;
use App\Http\Controllers\Api\DriversController;
use App\Http\Controllers\Api\ShipmentsController as ApiShipmentsController;

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
    Route::post('get-shipment-load-drivers', [ShipmentsController::class, 'getShipmentSupportedDrivers']);
    Route::controller(ChatsController::class)->group(function () {
        Route::post('search-user', 'searchUser');
    });
    Route::post('send-location', [ShipmentsController::class, 'curr_location']);


    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login');
        Route::post('register', 'register');
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('auth', function () {
            return ['message' => "Authenticated"];
        });
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
            Route::controller(ApiLoadscontroller::class)->group(function () {
                Route::prefix('shipment/load/{load}')->group(function () {
                    Route::get('delivered','delivered');

                });
            });
            Route::controller(DriversController::class)->group(function () {
                Route::get('dashboard', 'dashboard');
                Route::prefix('profile')->group(function () {
                    Route::get('/', 'profile');
                });
            });
        });

        Route::prefix('sender')->group(function () {
            Route::prefix('load')->group(function () {
                Route::post('rate-driver', [DriversController::class, 'rate_driver'])->name('sender.rate-driver');
            });
        });
    });
});
// });
