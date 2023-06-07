<?php

namespace App\Providers;

use App\Models\Equipment;
use App\Observers\EquipmentObserver;
use App\Services\CompaniesService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Equipment::observe(new EquipmentObserver(new CompaniesService()));
        Schema::defaultStringLength(191);
    }
}
