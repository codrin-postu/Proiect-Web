<?php

namespace core;

class Router
{
    public Request $request;
    private array $routes = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        //var_dump($callback); //Check for callback status.

        if (!$callback) 
        {
            return "Not found";
           
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

       return call_user_func($callback);
    }

    public function renderView($view)
    {
        $layout = $this->renderLayout();
        $content = $this->renderContent($view);
        return str_replace("{{content}}", $content, $layout);
    }

    private function renderLayout()
    {
        ob_start();     //caches output
        include Application::$rootDir."/views/layouts/mainhead.php";
        return ob_get_clean();
    }

    private function renderContent($view)
    {
        ob_start();
        include Application::$rootDir."/views/$view.php";
        return ob_get_clean();
    }
}