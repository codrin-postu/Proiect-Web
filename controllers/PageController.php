<?php

namespace controllers;

use core\Application;
use core\Controller;
use core\Request;

class PageController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'A simple Class Manager',
            'relPath' => '.',
            'stylesheet' => 'index.css'
        ];
        return $this->render('index', $data);
    }

    public function handleLogin(Request $request)
    {
        $body = $request->getBody();
        var_dump($body);
        return "Handling login data!";
    }
}