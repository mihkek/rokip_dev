<?php

use App\Http\Controllers\Admin\BrigadeAdminController;
use App\Http\Controllers\Admin\CompanyAdminController;
use App\Http\Controllers\Admin\ConsumerAdminController;
use App\Http\Controllers\Admin\DeviceAdminController;
use App\Http\Controllers\Admin\EquipmentAdminController;
use App\Http\Controllers\Admin\FileEquipmentAdminController;
use App\Http\Controllers\Admin\IndexAdminController;
use App\Http\Controllers\Admin\LogAdminController;
use App\Http\Controllers\Admin\MasterAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth'], //,'isAdmin'
    'prefix' => 'adminex',
    'as' => 'admin.'
], function () {

    Route::get('/', [IndexAdminController::class, 'home'])->name('home');

    // Оборудование
    Route::resource('equipments', EquipmentAdminController::class);


    Route::post('equipments/import', [EquipmentAdminController::class, 'import'])->name('equipments.import');
    Route::get('equipments/photos/{equipment_id}', [EquipmentAdminController::class, 'photos'])->name('equipments.photo');;
    Route::resource('new_equipments', EquipmentAdminController::class);
    // Компании
    Route::resource('companies', CompanyAdminController::class)
        ->parameters(['companies' => 'user']);
    // Мастера
    Route::resource('masters', MasterAdminController::class);


    Route::post('masters/remove', [MasterAdminController::class, 'remove'])->name('masters.remove');
    // Пользователи
    Route::resource('users', UserAdminController::class);

    //    Route::resource('/user-statuses', UserStatusAdminController::class);


    // Сущности


    // Временно не используемые роуты

    Route::resource('file_equipments', FileEquipmentAdminController::class);
    // Устройства
    // Route::resource('devices', DeviceAdminController::class);
    // Бригады
    //  Route::resource('brigades', BrigadeAdminController::class);
    // Потребители
    //  Route::resource('consumers', ConsumerAdminController::class);
    // Route::resource('/logs', LogAdminController::class);

});
