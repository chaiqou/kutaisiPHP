<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Core\App;
use App\Providers\AppServiceProvide;
use League\Container\Container;
use League\Container\ReflectionContainer;

error_reporting(0);


$container = new Container();

// Delegate the container to manage the dependencies
// explanation: https://container.thephpleague.com/3.x/auto-wiring/
$container->delegate(
    new ReflectionContainer()
);


$container->addServiceProvider(new AppServiceProvide());


// This file is the entry point of the application, it will create a new instance of the App class
// and start the application by calling the run method.
// also it will register routes and middlewares.

// Setup Container

$app = new App();

// Register Routes


$app->run();


