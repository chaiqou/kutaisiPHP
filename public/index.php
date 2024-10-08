<?php declare(strict_types=1);


use Chaiqou\Framework\Http\Request;
use Chaiqou\Framework\Http\Response;

require_once dirname(__DIR__) . '/vendor/autoload.php';

// Request
$request = Request::createFromGlobals();


// Response
$content = 'Hello, World!';

$response = new Response($content, 200, ['Content-Type' => 'text/html']);

$response->send();