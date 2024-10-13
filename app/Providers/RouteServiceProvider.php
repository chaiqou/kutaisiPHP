<?php

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use League\Route\Router;
use League\Route\Strategy\ApplicationStrategy;

class RouteServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{

    public function boot(): void
    {
       $this->container->add(Router::class, function () {
           $router = new Router();

           $router->setStrategy(
               (new ApplicationStrategy())->setContainer($this->container)
           );

           return $router;
       });

    }

    public function provides(string $id): bool
    {
        $services = [
            Router::class
        ];

        return in_array($id, $services);
    }

    public function register(): void
    {
        // TODO: Implement register() method.
    }
}