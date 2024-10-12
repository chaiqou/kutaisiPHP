<?php

namespace App\Core;

class Container
{
    protected static $instance;

    // This method will return the instance of the container
    // If the instance is not set, it will create a new instance
    // and return it
    // We use Singleton pattern here
    public static function getInstance(): \League\Container\Container
    {
        if(!self::$instance){
            self::$instance = new \League\Container\Container();
        }

        return self::$instance;
    }

}