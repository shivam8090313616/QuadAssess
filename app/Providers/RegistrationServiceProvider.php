<?php

namespace App\Providers;

use App\Services\RegistrationService;
use Illuminate\Support\ServiceProvider;

class RegistrationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RegistrationService::class, function ($app) {
            return new RegistrationService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
