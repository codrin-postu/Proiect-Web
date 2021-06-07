<?php

session_start();

require __DIR__."/../requires.php";
use core\Application;

$application = new Application(dirname(__DIR__)); //send in the project root DIR

$application->router->get('/', 'index');
$application->router->get('/login', 'login');

$application->run();