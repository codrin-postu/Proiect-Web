<?php

namespace core;

class Router
{
    private array $routes = [];
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        
    }
}