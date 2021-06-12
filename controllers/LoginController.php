<?php

namespace controllers;

use core\Application;
use core\Controller;
use core\Request;
use core\Response;
use models\LoginModel;
use models\UserModel;

class LoginController extends Controller
{


    public function login(Request $request, Response $response)
    {
        $login = new LoginModel();
        $data = [
            'pageTitle' => 'Login',
            'relPath' => '.',
            'stylesheet' => 'register.css',
            'model' => $login
        ];

        if ($request->isPost()) {
            $login->loadData($request->getBody());
            if ($login->validate() && $login->finalize()) {
                $response->redirect('dashboard/welcome');
                exit;
            }
        }
        $this->setLayout('mainhead');
        return $this->render('login', $data);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$application->logout();
        $response->redirect('/login');
    }
}