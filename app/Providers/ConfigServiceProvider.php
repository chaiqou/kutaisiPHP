<?php

namespace App\Providers;

use App\Config\Config;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class ConfigServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{

    public function boot(): void
    {
        // Register the Config class to the container as a singleton class
        $this->getContainer()->add(Config::class, function () {
            $config = new Config();

            return $this->mergeConfigFromFiles($config);
        })->setShared();
    }

    protected function mergeConfigFromFiles(Config $config): Config
    {
        // Load all the config files from the config directory
        $path = dirname(__DIR__, 2) . '/config';
        $files = array_diff(scandir($path), ['.', '..']);

        // Merge all the config files into one
        foreach ($files as $file) {
            $config->merge([
                str_replace('.php', '', $file) => require $path . '/' . $file
            ]);
        }

        return $config;
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