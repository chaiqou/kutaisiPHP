<?php

namespace App\Config;

class Config
{

   protected array $config = [];

   // Get the value of the given key from the configuration
    public function get(string $key, $default = null)
    {
       return dot($this->config)->get($key) ?? $default;
    }

    // Merge the given array with the current configuration
    public function merge(array $config): self
    {
       $this->config = array_merge_recursive($this->config, $config);

       return $this;
    }

}