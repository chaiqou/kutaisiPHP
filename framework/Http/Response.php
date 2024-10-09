<?php

namespace Chaiqou\Framework\Http;

class Response
{


    public function __construct(
        private readonly string $content = '',
        private readonly int $statusCode = 200,
        private readonly array $headers = [])
    {
    }

    public function send(): void
    {
    }

}