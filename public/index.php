<?php

session_start();

require __DIR__."/../requires.php";

use \controllers\PageController;
use core\Application;

$application = new Application(dirname(__DIR__)); //send in the project root DIR
$controller = new PageController();

$application->router->get('/', [$controller, 'index']);

$application->router->get('/login', [$controller, 'login']);
$application->router->post('/login', [$controller, 'handleLogin']);

$application->router->get('/register/academic', 'registeracademic');
$application->router->get('/register/student', 'registerstudent');


$application->router->get('/dashboard/welcome', 'dashboard/welcome');


$application->run();