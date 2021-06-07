<?php

namespace core;

class Application 
{

    // public static Application $application;
    public static string $rootDir;
    public Router $router;
    public Request $request;
    public Response $response;

    public function __construct($root)
    {
        self::$rootDir = $root;
        // self::$application = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run()
    {
        echo $this->router->resolve();
    }

}