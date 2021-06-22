<?php

namespace controllers;

use core\Application;
use core\Controller;
use core\Request;
use core\Response;
use models\ContactModel;

class PageController extends Controller
{
    public function index(Request $request, Response $response)
    {
        $contact = new ContactModel();
        $data = [
            'pageTitle' => 'A simple Class Manager',
            'relPath' => '.',
            'stylesheet' => 'index.css',
            'model' => $contact
        ];

        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send()) {
                Application::$application->session->setFlash('success', 'Your message has been recorded. We will get back to you!');
                return $response->redirect('/');
            }
        }
        return $this->render('index', $data);
    }

    public function documentation(Request $request)
    {
        return $this->render('scholarly');
    }
}
