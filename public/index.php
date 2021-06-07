<?php

session_start();

require __DIR__."/../requires.php";

use controllers\PageController;
use controllers\RegisterController;
use core\Application;

$application = new Application(dirname(__DIR__)); //send in the project root DIR
$pageController = new PageController();
$regController = new RegisterController();

$application->router->get('/', [$pageController, 'index']);

$application->router->get('/login', [$regController, 'login']);
$application->router->post('/login', [$regController, 'handleLogin']);

$application->router->get('/register/academic', [$regController, 'registerAcademic']);
$application->router->post('/register/academic', [$regController, 'registerAcademic']);

$application->router->get('/register/student', [$regController, 'registerStudent']);
$application->router->post('/register/student', [$regController, 'registerStudent']);

$application->router->get('/dashboard/welcome', 'dashboard/welcome');


$application->run();