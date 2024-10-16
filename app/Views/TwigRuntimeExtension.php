<?php

namespace App\Views;

use App\Config\Config;
use Psr\Container\ContainerInterface;
use Twig\Extension\AbstractExtension;

class TwigRuntimeExtension extends AbstractExtension
{
    public function __construct(protected ContainerInterface $container)
    {
    }

    public function config(): string
    {
        return $this->container->get(Config::class);
    }

}