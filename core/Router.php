<?php

namespace core;

use core\exceptions\NotFoundException;

class Router
{
    public Request $request;
    public Response $response;
    private array $routes = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
    
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = preg_replace('/\/\d+/ i', '/:id', $this->request->getPath());
        $method = $this->request->method();

        

        $callback = $this->routes[$method][$path] ?? false;

        //var_dump($callback); //Check for callback status.

        if (!$callback) 
        {
            Application::$application->controller = new Controller();
            throw new NotFoundException();
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if(is_array($callback)) {
            Application::$application->controller = new $callback[0]();
            Application::$application->controller->action = $callback[1];
            $callback[0] = Application::$application->controller;
            
            foreach (Application::$application->controller->getMiddlewares() as $middleware) {
                $middleware->execute();
            }
        }



        return call_user_func($callback, $this->request, $this->response);
    }

    public function renderGivenContent($viewContent, $data = [])
    {
        $layout = $this->renderLayout($data);
        return str_replace("{{content}}", $viewContent, $layout);
    }

    public function renderView($view, $data = [])
    {
        $layout = $this->renderLayout($data);
        $content = $this->renderContent($view, $data);
        return str_replace("{{content}}", $content, $layout);
    }

    private function renderLayout($data)
    {
        $layout = Application::$application->layout;
        if(Application::$application->controller) 
        {
            $layout = Application::$application->controller->layout;
        }
        ob_start();     //caches output
        include Application::$rootDir."/views/layouts/$layout.php";
        return ob_get_clean();
    }

    private function renderContent($view, $data)
    {
//        extract($data);  //extracts the key as a variable
        ob_start();
        include Application::$rootDir."/views/$view.php";
        return ob_get_clean();
    }
}