<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\InterviewUserService; // Correct namespace for the service class

class InterviewUserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Bind the InterviewUserService class to the container
        $this->app->bind(InterviewUserService::class, function ($app) {
            return new InterviewUserService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // You can add any booting code if required.
    }
}
