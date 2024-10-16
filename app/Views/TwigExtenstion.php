<?php

namespace App\Views;

use Twig\Extension\AbstractExtension;

class TwigExtenstion extends AbstractExtension
{

    public function getFunctions(): array
    {
        return [
            new \Twig\TwigFunction('config', [TwigRuntimeExtension::class, 'config'])
        ];
    }

}