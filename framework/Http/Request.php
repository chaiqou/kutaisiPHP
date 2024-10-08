<?php

namespace Chaiqou\Framework\Http;

class Request
{
    public $getParams;
    public $postParams;
    public $cookies;
    public $files;
    public $server;

    public function __construct(
    array $getParams,
    array $postParams,
    array $cookies,
    array $files,
    array $server
)
{
    $this->postParams = $postParams;
    $this->getParams = $getParams;
    $this->cookies = $cookies;
    $this->files = $files;
    $this->server = $server;
}

    public static function createFromGlobals(): Request
    {
        return new static(
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES,
            $_SERVER
        );
    }
}