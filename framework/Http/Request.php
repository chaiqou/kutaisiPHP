<?php

namespace Chaiqou\Framework\Http;

class Request
{
    public function __construct(
        private readonly array $getParams,
        private readonly array $postParams,
        private readonly array $cookies,
        private readonly array $files,
        public readonly array $server
)
{
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