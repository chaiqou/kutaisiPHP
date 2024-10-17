<?php

namespace App\Providers;

use App\Config\Config;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Cartalyst\Sentinel\Native\SentinelBootstrapper;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class AuthServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{

    protected Sentinel $sentinel;
    public function boot(): void
    {
        $bootstrapper = new SentinelBootstrapper(
            $this->getContainer()->get(Config::class)->get('auth')
        );

        $sentinel = Sentinel::instance($bootstrapper);

        $this->sentinel = $sentinel->getSentinel();

    }

    public function provides(string $id): bool
    {
        $services = [
            Sentinel::class,
        ];

        return in_array($id, $services);
    }

    public function register(): void
    {
        $this->getContainer()->add(Sentinel::class, function () {
            return $this->sentinel;
        })->setShared();
    }
}