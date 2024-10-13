<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Config\Config;
use App\Core\App;
use App\Core\Container;
use App\Providers\ConfigServiceProvider;
use Laminas\Diactoros\Response;
use League\Container\ReflectionContainer;
use League\Route\Router;

// Load environment variables from .env file
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$container = Container::getInstance();

// Delegate the container to manage the dependencies
// explanation: https://container.thephpleague.com/3.x/auto-wiring/
$container->delegate(
    new ReflectionContainer()
);

// Register the ConfigServiceProvider
$container->addServiceProvider(new ConfigServiceProvider());

$config = $container->get(Config::class);

// Register all the providers from the configuration
foreach ($config->get('app.providers') as $provider) {
    $container->addServiceProvider(new $provider());
}


// This file is the entry point of the application, it will create a new instance of the Config class
// and start the application by calling the run method.
// also it will register routes and middlewares.

// Setup Container

$app = new App($container);

// Register Routes from routes/web.php
// and pass the router and container to the closure
(require(dirname(__DIR__) . '/routes/web.php'))($app->getRouter(), $container);

$app->run();


