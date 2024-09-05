<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CashflowService;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Bind the CashflowService to the service container
        $this->app->singleton(CashflowService::class, function ($app) {
            return new CashflowService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
