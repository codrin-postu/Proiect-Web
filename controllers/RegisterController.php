<?php

namespace controllers;

use core\Application;
use core\Controller;
use core\Request;

class RegisterController extends Controller
{
    public function login()
    {
        $data = [
            'pageTitle' => 'Login',
            'relPath' => '.',
            'stylesheet' => 'register.css'
        ];
        return $this->render('login', $data);
    }

    public function registerAcademic(Request $request)
    {
        $data = [
            'pageTitle' => 'Create academic account',
            'relPath' => '..',
            'stylesheet' => '/register.css'
        ];
        return $this->render('register/academic', $data);
    }

    public function registerStudent(Request $request)
    {
        if ($request->isPost()) {
            return 'Handle submitted data!';
        }
        $data = [
            'pageTitle' => 'Create Student account',
            'relPath' => '..',
            'stylesheet' => 'register.css'
        ];
        return $this->render('register/student', $data);
    }
}