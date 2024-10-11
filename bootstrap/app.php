<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';


use App\Core\App;


// This file is the entry point of the application, it will create a new instance of the App class
// and start the application by calling the run method.
// also it will register routes and middlewares.

// Setup Container

$app = new App();

// Register Routes


$app->run();


