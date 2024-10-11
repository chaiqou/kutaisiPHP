<?php declare(strict_types=1);


use Chaiqou\Framework\Http\Kernel;
use Chaiqou\Framework\Http\Request;
use Chaiqou\Framework\Http\Response;

define("BASE_PATH", dirname(__DIR__));

require_once dirname(__DIR__) . '/vendor/autoload.php';

$request = Request::createFromGlobals();

$kernel = new Kernel();

$response = $kernel->handle($request);

$response->send();