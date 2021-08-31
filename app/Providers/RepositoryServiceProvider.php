<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Http\Interfaces\AdminRepositoryInterface',
            'App\Http\Repository\AdminRepository');

        
        $this->app->bind(
            'App\Http\Interfaces\AdminAuthRepositoryInterface',
            'App\Http\Repository\AdminAuthRepository');

        $this->app->bind(
            'App\Http\Interfaces\ReceiptRepositoryInterface',
            'App\Http\Repository\ReceiptRepository');

        $this->app->bind(
            'App\Http\Interfaces\FeeRepositoryInterface',
            'App\Http\Repository\FeeRepository');
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
