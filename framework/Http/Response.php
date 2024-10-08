<?php

namespace Chaiqou\Framework\Http;

class Response
{
    private $content;
    private $statusCode;
    private $headers;

    public function __construct(string $content = '', int $statusCode = 200, array $headers = [])
    {
        $this->content = $content;
        $this->statusCode = $statusCode;
        $this->headers = $headers;
    }

    public function send(): void
    {
    }

}