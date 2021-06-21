<?php

namespace controllers;

use core\Application;
use core\Controller;
use core\Request;
use models\UserModel;

use core\middlewares\RegisterMiddleware;

class RegisterController extends Controller
{

    public function __construct()
    {
        //$this->registerMiddleware(new RegisterMiddleware(['dashboardWelcome', 'dashboardAccount']));
    }

    public function registerAcademic(Request $request)
    {
        $user = new UserModel();
        $data = [
            'pageTitle' => 'Create academic account',
            'relPath' => '..',
            'stylesheet' => 'register.css',
            'model' => $user
        ];
        if ($request->isPost()) {

            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$application->session->setFlash('success', 'Your account has been registered succesfully!');
                Application::$application->response->redirect('/login');
                exit;
            }
            return $this->render('register/academic', $data);
        }

        return $this->render('register/academic', $data);
    }

    public function registerStudent(Request $request)
    {
        $user = new UserModel();
        $data = [
            'pageTitle' => 'Create Student account',
            'relPath' => '..',
            'stylesheet' => 'register.css',
            'model' => $user
        ];

        if ($request->isPost()) {

            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$application->session->setFlash('success', 'Your account has been registered succesfully!');
                Application::$application->response->redirect('/login');
                exit;
            }
            return $this->render('register/student', $data);
        }

        return $this->render('register/student', $data);
    }
}
