<?php

namespace core;

use Exception;

class Application
{

    public static Application $application;
    public static string $rootDir;

    public string $layout = 'mainhead';
    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;
    public Database $database;
    public Session $session;
    public ?DatabaseModel $user;

    public function __construct($root)
    {
        self::$rootDir = $root;
        self::$application = $this;
        $this->userClass = USER_CLASS;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();

        $this->router = new Router($this->request, $this->response);

        $this->database = new Database();

        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $primaryKey = (new $this->userClass)->primaryKey();
            $this->user= (new $this->userClass())->findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = NULL;
        }
        
        
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (Exception $e) {
            echo $this->router->renderView("_error", ["exception" => $e]);
        }
        
    }

    public function getController()
    {
        return $this->controller;
    }

    public function setController($controller) 
    {  
        $this->controller = $controller;
    }

    public function login(DatabaseModel $user)
    {  
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);

        return true;
    }

    public function logout() : void
    {  
        $this->user = NULL;
        $this->session->remove('user');
    }

    public static function isGuest()
    {
        return !self::$application->user;
    }

}