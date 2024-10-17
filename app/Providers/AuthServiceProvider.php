<?php

namespace App\Providers;

use Cartalyst\Sentinel\Native\SentinelBootstrapper;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class AuthServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{

    public function boot(): void
    {
        $bootstrapper = new SentinelBootstrapper();

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