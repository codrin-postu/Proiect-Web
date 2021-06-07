<?php

namespace core;

class Application 
{

    public static string $rootDir;
    public Router $router;
    public Request $request;

    public function __construct($root)
    {
        self::$rootDir = $root;
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        echo $this->router->resolve();
    }

}