<?php

use App\Http\Controllers\V1\AuthApiController;
use App\Http\Controllers\V1\DeviceApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'v1',
], function () {
    Route::apiResource('devices', DeviceApiController::class);
    Route::group([
        'middleware' => 'auth:sanctum'
    ], function () {
        Route::post('logout', [AuthApiController::class, 'logout'])->name('logout');
        Route::post('reset-password', [AuthApiController::class, 'reset_password'])->name('reset_password');

        //        Route::apiResource('orders',OrderApiController::class);
    });

    Route::post('login', [AuthApiController::class, 'login'])->name('login');
    //    Route::post('register',[AuthApiController::class, 'register'])->name('register');
    //    Route::post('confirm',[AuthApiController::class, 'confirm'])->name('confirm');
});
