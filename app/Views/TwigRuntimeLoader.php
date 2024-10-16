<?php

namespace App\Views;

use Psr\Container\ContainerInterface;
use Twig\RuntimeLoader\RuntimeLoaderInterface;

class TwigRuntimeLoader implements RuntimeLoaderInterface
{
    public function __construct(
        protected ContainerInterface $container
    )
    {
    }

    public function load(string $class)
    {
        if($class === TwigRuntimeExtension::class) {
            return new TwigRuntimeExtension($this->container);
        }
    }
}