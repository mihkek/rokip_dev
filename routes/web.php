<?php

use Illuminate\Support\Facades\Route;


require('_admin.php');
require('_auth.php');
require('_user.php');
require('_request.php');
require('_clear.php');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
