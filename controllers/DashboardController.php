<?php

namespace controllers;

use core\Controller;
use core\Request;

class DashboardController extends Controller
{
    public function dashboardWelcome(Request $request)
    {
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
}