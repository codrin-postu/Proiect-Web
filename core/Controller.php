<?php

namespace core;

use core\Middleware;

class Controller
{
    public string $layout = "mainhead";

    public string $action = "";

    private array $middlewares = [];

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function render($view, $data = [])
    {
        return Application::$application->router->renderView($view, $data);
    }

    public function registerMiddleware(Middleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    public function getMiddlewares()
    {
        return $this->middlewares;
    }
}