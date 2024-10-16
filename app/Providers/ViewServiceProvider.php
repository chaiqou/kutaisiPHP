<?php

namespace App\Providers;

use App\Config\Config;
use App\Views\TwigExtenstion;
use App\Views\TwigRuntimeLoader;
use App\Views\View;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class ViewServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{

    public function boot(): void
    {
        // TODO: Implement boot() method.
    }

    public function provides(string $id): bool
    {
       $services = [
           View::class
       ];

         return in_array($id, $services);
    }

    public function register(): void
    {
        $this->getContainer()->add(View::class, function () {
          $loader = new FilesystemLoader(__DIR__ . '/../../resources/views');
          $debug = $this->getContainer()->get(Config::class)->get('app.debug');

          $twig = new Environment($loader, [
              'cache' => false,
              'debug' => $debug
          ]);

          $twig->addRuntimeLoader(
               new TwigRuntimeLoader($this->getContainer())
          );
          $twig->addExtension(new TwigExtenstion());

          if($debug) {
              $twig->addExtension(new \Twig\Extension\DebugExtension());
          }

          return new View($twig);
        });
    }
}