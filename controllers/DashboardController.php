<?php

namespace controllers;

use core\Application;
use core\Controller;
use core\Request;
use middlewares\AcademicMiddleware;
use middlewares\RegisterMiddleware;
use models\ClassroomModel;


class DashboardController extends Controller
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

    public function dashboardWelcome(Request $request)
    {
        echo '<pre>';
        preg_match('/\/\d+\//',$request->getPath(), $matches);
        var_dump($matches);
        echo '</pre>';
        $data = [
            'pageTitle' => 'Welcome',
            'relPath' => '..',
            'stylesheet' => 'dashboard.css',
        ];
        $this->setLayout('dashboardheader');
        return $this->render('dashboard/welcome', $data);
    }

    public function dashboardAccount(Request $request)
    {
        
        $data = [
            'pageTitle' => 'Account',
            'relPath' => '..',
            'stylesheet' => 'dashboard.css',
        ];
        $this->setLayout('dashboardheader');
        return $this->render('dashboard/account', $data);
    }

    public function dashboardSecurity(Request $request)
    {
        $data = [
            'pageTitle' => 'Security',
            'relPath' => '..',
            'stylesheet' => 'dashboard.css',
        ];
        $this->setLayout('dashboardheader');
        return $this->render('dashboard/security', $data);
    }

    public function dashboardClassroomJoin(Request $request)
    {
        $data = [
            'pageTitle' => 'Join a Classroom',
            'relPath' => '../..',
            'stylesheet' => 'dashboard.css',
        ];
        $this->setLayout('dashboardheader');
        return $this->render('dashboard/joinclassroom', $data);
    }

    public function dashboardClassroomCreate(Request $request)
    {
        $classroom = new ClassroomModel();
        $data = [
            'pageTitle' => 'Create a Classroom',
            'relPath' => '../..',
            'stylesheet' => 'dashboard.css',
            'model' => $classroom
        ];

        if($request->isPost()) {
            $classroom->loadData($request->getBody());

            if ($classroom->validate() && $classroom->save()) {
                Application::$application->session->setFlash('success', 'The classroom has been created succesfully!');
                Application::$application->response->redirect('/dashboard/classroom/create');
                exit;
            }
        }
        $this->setLayout('dashboardheader');
        return $this->render('dashboard/createclassroom', $data);
    }
}