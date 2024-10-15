<?php

namespace App\Providers;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\DatabaseManager;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class DatabaseServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    protected Manager $capsule;

    public function boot(): void
    {
        $config = $this->container->get('config');
        $driver = $config->get('database.driver');

        $capsule = new Manager();

        $capsule->addConnection($config->get("database.{$driver}"), $driver);

        $capsule->bootEloquent();

        $capsule->getDatabaseManager()->setDefaultConnection($driver);

        $this->capsule = $capsule;
    }

    public function provides(string $id): bool
    {
     $provides = [
            DatabaseManager::class,
        ];

        return in_array($id, $provides);
    }

    public function register(): void
    {
        $this->getContainer()->add(DatabaseManager::class, function () {
            return $this->capsule->getDatabaseManager();
        })->setShared();
    }
}