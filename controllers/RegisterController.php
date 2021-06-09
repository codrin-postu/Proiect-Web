<?php

namespace controllers;

use core\Application;
use core\Controller;
use core\Request;
use models\UserModel;

class RegisterController extends Controller
{
    public function login()
    {
        $data = [
            'pageTitle' => 'Login',
            'relPath' => '.',
            'stylesheet' => 'register.css'
        ];
        $this->setLayout('mainhead');
        return $this->render('login', $data);
    }

    public function registerAcademic(Request $request)
    {
        $registerModel = new UserModel();
        $data = [
            'pageTitle' => 'Create academic account',
            'relPath' => '..',
            'stylesheet' => 'register.css',
            'model' => $registerModel
        ];
        if ($request->isPost()) {
            
            $registerModel->loadData($request->getBody());

            if ($registerModel->validate() && $registerModel->register()) 
            {
                return 'Account created!';
            }
            return $this->render('register/academic', $data);
        }
        
        return $this->render('register/academic', $data);
    }

    public function registerStudent(Request $request)
    {
        $registerModel = new UserModel();
        $data = [
            'pageTitle' => 'Create Student account',
            'relPath' => '..',
            'stylesheet' => 'register.css',
            'model' => $registerModel
        ];

        if ($request->isPost()) {
            
            $registerModel->loadData($request->getBody());

            if ($registerModel->validate() && $registerModel->register()) 
            {
                return 'Account created!';
            }
            return $this->render('register/student', $data);
        }
        
        return $this->render('register/student', $data);
    }
}