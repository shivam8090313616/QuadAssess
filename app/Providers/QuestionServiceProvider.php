<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\QuestionService;

class QuestionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Bind the QuestionService to the service container
        $this->app->singleton(QuestionService::class, function ($app) {
            return new QuestionService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Any bootstrapping actions for the service provider can go here.
    }
}
