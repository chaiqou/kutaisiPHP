<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Core\App;
use App\Core\Container;
use App\Providers\AppServiceProvide;
use App\Providers\ConfigServiceProvider;
use League\Container\ReflectionContainer;

$container = Container::getInstance();

// Delegate the container to manage the dependencies
// explanation: https://container.thephpleague.com/3.x/auto-wiring/
$container->delegate(
    new ReflectionContainer()
);

// Register Service Providers
$container->addServiceProvider(new ConfigServiceProvider());
$container->addServiceProvider(new AppServiceProvide());


// This file is the entry point of the application, it will create a new instance of the Config class
// and start the application by calling the run method.
// also it will register routes and middlewares.

// Setup Container

$app = new App();

// Register Routes


$app->run();


