<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('clear',function (){
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
//    Artisan::call('optimize');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return 'cleared';
});
