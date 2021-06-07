<?php

session_start();

require __DIR__."/../requires.php";
use core\Application;

$application = new Application(dirname(__DIR__)); //send in the project root DIR

$application->router->get('/', 'index');

$application->router->get('/login', 'login');
$application->router->post('/login', function(){
    return "handling submitted data;";
});
$application->router->get('/register/academic', 'registeracademic');
$application->router->get('/register/student', 'registerstudent');


$application->router->get('/dashboard/welcome', 'dashboard/welcome');


$application->run();