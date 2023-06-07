<?php

use App\Http\Controllers\RequestController;

Route::group([
    'middleware' => ['auth'],//,'isAdmin'
    'prefix' => 'js',
    'as' => 'js.'
], function () {

    Route::post('/company_masters', [RequestController::class,'company_masters'])->name('company_masters');

});
