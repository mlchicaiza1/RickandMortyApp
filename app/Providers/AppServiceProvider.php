<?php

namespace App\Providers;

use App\Contracts\IRickAndMortyService;
use App\Services\RickAndMortyService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
          $this->app->bind(IRickAndMortyService::class, RickAndMortyService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
