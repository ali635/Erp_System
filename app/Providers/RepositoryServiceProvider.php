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
                'App\Http\Interfaces\UserInterface',
                'App\Http\Repository\UserRepository');

        $this->app->bind(
                'App\Http\Interfaces\SellsInterface',
                'App\Http\Repository\SellsRepository');


        $this->app->bind(
            'App\Http\Interfaces\PurchasesInterface',
            'App\Http\Repository\PurchasesRepository');

        $this->app->bind(
            'App\Http\Interfaces\SupplierInterface',
            'App\Http\Repository\SupplierRepository');

        $this->app->bind(
                'App\Http\Interfaces\ReportsInterface',
                'App\Http\Repository\ReportsRepository');

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
