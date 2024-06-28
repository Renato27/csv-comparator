<?php

namespace App\Providers;

use App\Services\Contracts\CsvComparatorServiceInterface;
use App\Services\CsvComparatorService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CsvComparatorServiceInterface::class, CsvComparatorService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
