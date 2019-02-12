<?php

namespace Submtd\LaravelModelVariables\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelModelVariablesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // config
        $this->mergeConfigFrom(__DIR__ . '/../../config/laravel-model-variables.php', 'laravel-model-variables');
        $this->publishes([__DIR__ . '/../../config' => config_path()], 'config');
        // migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->publishes([__DIR__ . '/../../database' => database_path()], 'migrations');
    }
}
