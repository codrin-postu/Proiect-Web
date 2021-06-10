<?php

session_start();

require __DIR__."/../requires.php";

use controllers\PageController;
use controllers\RegisterController;
use core\Application;

$application = new Application(dirname(__DIR__)); //send in the project root DIR

$application->router->get('/', [PageController::class, 'index']);

$application->router->get('/login', [RegisterController::class, 'login']);
$application->router->post('/login', [RegisterController::class, 'handleLogin']);

$application->router->get('/register/academic', [RegisterController::class, 'registerAcademic']);
$application->router->post('/register/academic', [RegisterController::class, 'registerAcademic']);

$application->router->get('/register/student', [RegisterController::class, 'registerStudent']);
$application->router->post('/register/student', [RegisterController::class, 'registerStudent']);

$application->router->get('/dashboard/welcome', [RegisterController::class, 'dashboardWelcome']);


$application->run();