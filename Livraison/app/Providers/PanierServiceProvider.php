<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\PanierInterfaceRepository;
use App\Repositories\PanierSessionRepository;

class PanierServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PanierInterfaceRepository::class, PanierSessionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}



