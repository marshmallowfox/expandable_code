<?php

namespace App\Providers;

use App\Contracts\ICodeRepository;
use App\Repositories\ModelCodeRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ICodeRepository::class, ModelCodeRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
