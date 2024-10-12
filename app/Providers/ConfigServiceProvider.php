<?php

namespace App\Providers;

use App\Config\Config;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class ConfigServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{

    public function boot(): void
    {
        $this->getContainer()->add(Config::class, function () {
            return new Config();
        });
    }

    public function provides(string $id): bool
    {
        $services = [
            Config::class
        ];

        return in_array($id, $services);
    }

    public function register(): void
    {
        // TODO: Implement register() method.
    }
}