<?php

namespace App\Providers;

use App\Factories\CodeSenderHandlersFactory;
use Illuminate\Support\ServiceProvider;

class CodeSenderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(CodeSenderHandlersFactory::class, function ($app) {
            return new CodeSenderHandlersFactory($app);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
