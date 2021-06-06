<?php

session_start();

require_once "./requires.php";
use core\Application;

$application = new Application();

$router = new Router();
$application->$router->get('/',function() {
    return 'Hello World';
})

$application->run();