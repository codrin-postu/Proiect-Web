<?php

session_start();

require __DIR__ . "/../requires.php";

use controllers\AttendanceController;
use controllers\DashboardController;
use controllers\PageController;
use controllers\RegisterController;
use controllers\LoginController;
use controllers\ClassroomController;
use controllers\DocumentationController;
use controllers\GradesController;
use controllers\HomeworkController;
use core\Application;
use models\ClassroomModel;

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
$application->router->post('/dashboard/account', [DashboardController::class, 'dashboardAccount']);

$application->router->get('/dashboard/security', [DashboardController::class, 'dashboardSecurity']);
$application->router->post('/dashboard/security', [DashboardController::class, 'dashboardSecurity']);

$application->router->get('/dashboard/classroom/join', [DashboardController::class, 'dashboardClassroomJoin']);
$application->router->post('/dashboard/classroom/join', [DashboardController::class, 'dashboardClassroomJoin']);

$application->router->get('/dashboard/classroom/create', [DashboardController::class, 'dashboardClassroomCreate']);
$application->router->post('/dashboard/classroom/create', [DashboardController::class, 'dashboardClassroomCreate']);

$application->router->get("/dashboard/classroom/:id/info", [ClassroomController::class, 'classroomInfo']);

$application->router->get('/dashboard/classroom/:id/documentation', [DocumentationController::class, 'classroomDocumentationList']);

$application->router->get('/dashboard/classroom/:id/documentation/:id', [DocumentationController::class, 'classroomDocumentation']);
$application->router->post('/dashboard/classroom/:id/documentation/:id', [DocumentationController::class, 'classroomDocumentation']);

$application->router->get('/dashboard/classroom/:id/documentation/create', [DocumentationController::class, 'classroomDocumentationCreate']);
$application->router->post('/dashboard/classroom/:id/documentation/create', [DocumentationController::class, 'classroomDocumentationCreate']);

$application->router->get('/dashboard/classroom/:id/attendance', [AttendanceController::class, 'classroomAttendance']);
$application->router->post('/dashboard/classroom/:id/attendance', [AttendanceController::class, 'classroomAttendance']);

$application->router->get('/dashboard/classroom/:id/homework', [HomeworkController::class, 'classroomHomeworkList']);

$application->router->get('/dashboard/classroom/:id/homework/create', [HomeworkController::class, 'classroomHomeworkCreate']);
$application->router->post('/dashboard/classroom/:id/homework/create', [HomeworkController::class, 'classroomHomeworkCreate']);

$application->router->get('/dashboard/classroom/:id/homework/:id', [HomeworkController::class, 'classroomHomework']);
$application->router->post('/dashboard/classroom/:id/homework/:id', [HomeworkController::class, 'classroomHomework']);

$application->router->get('/dashboard/classroom/:id/homework/:id/received', [HomeworkController::class, 'classroomHomeworkReceived']);
$application->router->get('/dashboard/classroom/:id/homework/:id/download', [HomeworkController::class, 'classroomHomeworkDownload']);

$application->router->get('/dashboard/classroom/:id/homework/:id/review', [HomeworkController::class, 'classroomHomeworkReview']);
$application->router->post('/dashboard/classroom/:id/homework/:id/review', [HomeworkController::class, 'classroomHomeworkReview']);

$application->router->get('/dashboard/classroom/:id/grades', [GradesController::class, 'classroomGrades']);
$application->router->post('/dashboard/classroom/:id/grades', [GradesController::class, 'classroomGrades']);


$application->router->get('/dashboard/classroom/:id/grades/add', [GradesController::class, 'classroomGradesAdd']);
$application->router->post('/dashboard/classroom/:id/grades/add', [GradesController::class, 'classroomGradesAdd']);


$application->run();
