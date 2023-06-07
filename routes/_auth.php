<?php

use App\Http\Controllers\DreamSecurityController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ObjectCardController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\TechnicalApplicationController;
use App\Http\Controllers\WorkingController;

//Route::get('verify/{token?}', [VerifyEmailController::class,'emailVerify'])->name('emailVerify');
//Route::post('verify', [VerifyEmailController::class,'emailVerifyPost'])->name('emailVerifyPost');

//Route::get('/login/{service}', [LoginController::class,'redirectToProvider'])->name('social');
//Route::get('/login/{service}/callback', [LoginController::class,'handleProviderCallback']);

Auth::routes();

Route::group(['middleware' => ['auth'],], function () { //,'verified'
    Route::get('/', [IndexController::class, 'home'])
        ->name('home');

    //


});
