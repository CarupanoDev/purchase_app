<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Purchase\Domain\Contracts\PurchaseRepository;
use Src\Purchase\Infrastructure\Repositories\EloquentPurchaseRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            PurchaseRepository::class,
            EloquentPurchaseRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
