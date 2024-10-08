<?php declare(strict_types=1);


use Chaiqou\Framework\Http\Request;

require_once dirname(__DIR__) . '/vendor/autoload.php';

// Request
$request = Request::createFromGlobals();
