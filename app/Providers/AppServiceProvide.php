<?php

namespace App\Providers;

use App\Config\Config;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use Spatie\Ignition\Ignition;

class AppServiceProvide extends AbstractServiceProvider implements BootableServiceProviderInterface
{

    public function boot(): void
    {
        // Register Ignition for better error handling
        // Only do this in development mode
        // Ignition will not be registered in production
        $config = $this->container->get(Config::class);
        Ignition::make()->register();

    }

    public function provides(string $id): bool
    {
        $provides = [
            Config::class,
        ];

        return in_array($id, $provides);
    }

    public function register(): void
    {
        //

    }
}