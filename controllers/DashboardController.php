<?php

namespace controllers;

use core\Application;
use core\Controller;
use core\Request;
use middlewares\AcademicMiddleware;
use middlewares\RegisterMiddleware;
use middlewares\StudentMiddleware;
use models\ClassroomModel;
use models\UserClassroomModel;
use models\UserModel;
use models\ClassroomJoinModel;
use models\UserUpdateModel;

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

        $this->registerMiddleware(new StudentMiddleware([
            'dashboardClassroomJoin'
        ]));
    }

    public function dashboardWelcome(Request $request)
    {
        // echo '<pre>';
        // preg_match('/\/\d+\//', $request->getPath(), $matches);
        // var_dump($matches);
        // echo '</pre>';

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
        $userUpdate = new UserUpdateModel();
        $user = UserModel::getUser(Application::$application->session->get('user'));
        $data = [
            'pageTitle' => 'Account',
            'relPath' => '..',
            'stylesheet' => 'dashboard.css',
            'model' => $userUpdate
        ];


        $userUpdate->loadData([
            'id' => $user->id,
            'firstName' => $user->firstName,
            'middleName' => $user->middleName,
            'lastName' => $user->lastName,
            'email' => $user->email
        ]);

        if ($request->isPost()) {
            $userUpdate->loadData($request->getBody());

            // echo "<pre>";
            // var_dump($userUpdate);
            // echo "</pre>";
            // exit;
            if ($userUpdate->validate() && $userUpdate->update()) {
                Application::$application->session->setFlash('success', 'Your information has been updated!');
                Application::$application->response->redirect('/dashboard/account');
                exit;
            }
        }
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

        if ($request->isPost()) {
            $classroomJoin->loadData($request->getBody());
            $userClassroom->loadData([
                "classroomId" => $classroomJoin->classroomId,
                "userId" => Application::$application->user->id,
                "type" => "student"
            ]);

            if ($classroomJoin->validate() && $classroomJoin->finalize() && $userClassroom->save()) {
                Application::$application->session->setFlash('success', 'The code has been sent! Please wait for professor approval!');
                Application::$application->response->redirect('/dashboard/classroom/join');
                exit;
            }
        }

        $this->setLayout('dashboardheader');
        return $this->render('dashboard/security', $data);
    }

    public function dashboardClassroomJoin(Request $request)
    {
        $classroomJoin = new ClassroomJoinModel();
        $user = Application::$application->session->get('user');
        $userClassroom = new UserClassroomModel();

        $data = [
            'pageTitle' => 'Join a Classroom',
            'relPath' => '../..',
            'stylesheet' => 'dashboard.css',
            'model' => $classroomJoin
        ];

        if ($request->isPost()) {
            $classroomJoin->loadData($request->getBody());
            $userClassroom->loadData([
                "classroomId" => $classroomJoin->classroomId,
                "userId" => Application::$application->user->id,
                "type" => "student"
            ]);

            if ($classroomJoin->validate() && $classroomJoin->finalize() && $userClassroom->save()) {
                Application::$application->session->setFlash('success', 'The code has been sent! Please wait for professor approval!');
                Application::$application->response->redirect('/dashboard/classroom/join');
                exit;
            }
        }
        $this->setLayout('dashboardheader');
        return $this->render('dashboard/joinclassroom', $data);
    }

    public function dashboardClassroomCreate(Request $request)
    {
        $classroom = new ClassroomModel();
        $user = Application::$application->session->get('user');
        $userClassroom = new UserClassroomModel();
        // echo '<pre>';
        // var_dump();
        // echo '</pre>';


        $data = [
            'pageTitle' => 'Create a Classroom',
            'relPath' => '../..',
            'stylesheet' => 'dashboard.css',
            'model' => $classroom
        ];

        if ($request->isPost()) {
            $classroom->loadData($request->getBody());
            $userClassroom->loadData([
                "classroomId" => ClassroomModel::getLatestId(),
                "userId" => Application::$application->user->id,
                "type" => "creator"
            ]);

            if ($classroom->validate() && $classroom->save() && $userClassroom->save()) {
                Application::$application->session->setFlash('success', 'The classroom has been created succesfully!');
                Application::$application->response->redirect('/dashboard/classroom/create');
                exit;
            }
        }
        $this->setLayout('dashboardheader');
        return $this->render('dashboard/createclassroom', $data);
    }
}
