<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Services\IPostService;
use App\Domain\Services\PostService;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IPostService::class, PostService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
