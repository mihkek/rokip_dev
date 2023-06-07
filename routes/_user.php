<?php

use App\Http\Controllers\User\IndexUserController;

Route::group(['middleware' => 'auth','prefix' => 'my', 'as' => 'user.'], function () {

//    Route::get('/', [IndexUserController::class, 'home'])->name('home');

});
