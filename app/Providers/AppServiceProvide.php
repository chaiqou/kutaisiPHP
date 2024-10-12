<?php

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use Spatie\Ignition\Ignition;

class AppServiceProvide extends AbstractServiceProvider implements BootableServiceProviderInterface
{

    public function boot(): void
    {
        // Register Ignition for better error handling
        // Only do this in development mode
        Ignition::make()->register ();
    }

    public function provides(string $id): bool
    {
       //
    }

    public function register(): void
    {
        //

    }
}