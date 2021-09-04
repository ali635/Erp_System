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

        $this->app->bind(
            'App\Http\Interfaces\StoreRepositoryInterface',
            'App\Http\Repository\StoreRepository');

        $this->app->bind(
            'App\Http\Interfaces\ProductRepositoryInterface',
            'App\Http\Repository\ProductRepository');


        $this->app->bind(
            'App\Http\Interfaces\TaxRepositoryInterface',
            'App\Http\Repository\TaxRepository');

        $this->app->bind(
            'App\Http\Interfaces\RoleRepositoryInterface',
            'App\Http\Repository\RoleRepository');
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
