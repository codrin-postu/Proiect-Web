<?php

namespace controllers;

use core\Application;
use core\Controller;

class PageController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'A simple Class Manager'
        ];
        return $this->render('index', $data);
    }

    public function login()
    {
        return "Show login form!";
    }

    public function handleLogin()
    {
        return "Handling login data!";
    }
}