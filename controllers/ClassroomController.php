<?php

namespace controllers;

use core\Controller;
use core\Request;
use middlewares\AcademicMiddleware;
use middlewares\RegisterMiddleware;

class ClassroomController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new RegisterMiddleware([
            'dashboardWelcome', 
            'dashboardAccount',
            'dashboardSecurity'
        ]));
        
        $this->registerMiddleware(new AcademicMiddleware([
            'dashboardClassroomCreate'
        ]));
    }

    public function classroomInfo(Request $request)
    {
        $data = [
            'pageTitle' => 'Welcome',
            'relPath' => '..',
            'stylesheet' => 'dashboard.css',
        ];
        $this->setLayout('dashboardheader');
        return $this->render('dashboard/classroom/classinfo', $data);
    }
}