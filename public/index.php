<?php

session_start();

require __DIR__."/../requires.php";

use controllers\DashboardController;
use controllers\PageController;
use controllers\RegisterController;
use controllers\LoginController;
use core\Application;

$application = new Application(dirname(__DIR__)); //send in the project root DIR

$application->router->get('/', [PageController::class, 'index']);
$application->router->post('/', [PageController::class, 'index']);

$application->router->get('/login', [LoginController::class, 'login']);
$application->router->post('/login', [LoginController::class, 'login']);

$application->router->get('/logout', [LoginController::class, 'logout']);

$application->router->get('/register/academic', [RegisterController::class, 'registerAcademic']);
$application->router->post('/register/academic', [RegisterController::class, 'registerAcademic']);

$application->router->get('/register/student', [RegisterController::class, 'registerStudent']);
$application->router->post('/register/student', [RegisterController::class, 'registerStudent']);

// All dashboard routes \/

$application->router->get('/dashboard/welcome', [DashboardController::class, 'dashboardWelcome']);

$application->router->get('/dashboard/account', [DashboardController::class, 'dashboardAccount']);
// $application->router->post('/dashboard/account', [DashboardController::class, 'dashboardAccount']);

$application->router->get('/dashboard/security', [DashboardController::class, 'dashboardSecurity']);
// $application->router->post('/dashboard/security', [DashboardController::class, 'dashboardSecurity']);

$application->router->get('/dashboard/classroom/join', [DashboardController::class, 'dashboardClassroomJoin']);
// $application->router->post('/dashboard/classroom/join', [DashboardController::class, 'dashboardClassroomJoin']);

$application->router->get('/dashboard/classroom/create', [DashboardController::class, 'dashboardClassroomCreate']);
// $application->router->post('/dashboard/classroom/create', [DashboardController::class, 'dashboardClassroomCreate']);

$application->router->get('/dashboard/classroom/{classroomId}/info', [ClassroomController::class, 'classroomInfo']);

$application->router->get('/dashboard/classroom/{classroomId}/documentation', [ClassroomController::class, 'classroomDocumentation']);

$application->router->get('/dashboard/classroom/{classroomId}/attendance', [ClassroomController::class, 'classroomAttendance']);

$application->router->get('/dashboard/classroom/{classroomId}/attendance', [ClassroomController::class, 'classroomAttendance']);

$application->router->get('/dashboard/classroom/{classroomId}/grades', [ClassroomController::class, 'classroomGrades']);

$application->router->get('/dashboard/classroom/{classroomId}/homework', [ClassroomController::class, 'classroomHomeworkList']);

$application->router->get('/dashboard/classroom/{classroomId}/homework/{hwId}', [ClassroomController::class, 'classroomHomework']);
$application->router->post('/dashboard/classroom/{classroomId}/homework/{hwId}', [ClassroomController::class, 'classroomHomework']);

$application->run();