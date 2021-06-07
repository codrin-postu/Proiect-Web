<?php

namespace core;

class Controller
{
    public string $layout = "mainhead";

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function render($view, $data = [])
    {
        return Application::$application->router->renderView($view, $data);
    }
}