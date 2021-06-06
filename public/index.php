<?php

session_start();

require "../requires.php";

$application = new Application();

$router = new Router();
$router->get('/',function() {
    return 'Hello World';
})

$application->useRouter($router);

$application->run();