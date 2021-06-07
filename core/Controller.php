<?php

namespace core;

class Controller
{
    public function render($view, $data = [])
    {
        return Application::$application->router->renderView($view, $data);
    }
}