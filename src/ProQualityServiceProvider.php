<?php

namespace Programic\ProQuality;

use Illuminate\Support\ServiceProvider;

class ProQualityServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands([
            Commands\ProQualityInstallCommand::class,
        ]);
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Register magic
    }
}
