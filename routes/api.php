<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoadsController;
use App\Http\Controllers\Api\ChatsController;

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
    Route::prefix('v1')->group(function(){
        Route::get('location/search',[LoadsController::class,'location']);
        Route::controller(ChatsController::class)->group(function(){
            Route::post('search-user','searchUser');
        });
    });
// });
