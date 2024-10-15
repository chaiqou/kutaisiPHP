<?php

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class DatabaseServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{

    public function boot(): void
    {
        // TODO: Implement boot() method.
    }

    public function provides(string $id): bool
    {
        // TODO: Implement provides() method.
    }

    public function register(): void
    {
        // TODO: Implement register() method.
    }
}