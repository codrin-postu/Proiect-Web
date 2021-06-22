<?php

namespace controllers;

use core\Controller;
use core\Request;
use middlewares\RegisterMiddleware;
use middlewares\MemberClassroomMiddleware;
use middlewares\CreatorClassroomMiddleware;
use models\ClassroomModel;
use models\UserClassroomModel;
use core\Application;
use models\UserAttendanceModel;
use models\UserHomeworkModel;

class ClassroomController extends Controller
{


    public function __construct()
    {
        $this->registerMiddleware(new RegisterMiddleware([
            'classroomInfo',
        ]));

        $this->registerMiddleware(new MemberClassroomMiddleware([
            'classroomInfo',
        ]));

        $this->registerMiddleware(new CreatorClassroomMiddleware([
            'classroomStudents'
        ]));
    }

    public function classroomInfo(Request $request)
    {
        preg_match('/\d{6,}/', $request->getPath(), $matches);
        $classroom = (new ClassroomModel())->findOne(['id' => $matches[0]]);

        $data = [
            'pageTitle' => $classroom->name,
            'relPath' => '../../..',
            'stylesheet' => 'dashboard.css',
            'model' => $classroom
        ];

        $this->setLayout('dashboardheader');
        return $this->render('dashboard/classroom/classinfo', $data);
    }

    public function classroomStudents(Request $request)
    {
        preg_match('/\d{6,}/', $request->getPath(), $matches);
        $classroom = (new ClassroomModel())->findOne(['id' => $matches[0]]);

        $userClassroom = (new UserClassroomModel())->findOne(
            [
                'userId' => Application::$application->session->get('user'),
                'classroomId' => $classroom->id
            ]
        );

        $data = [
            'pageTitle' => $classroom->name,
            'relPath' => '../../..',
            'stylesheet' => 'dashboard.css',
            'classroom' => $classroom,
            'userClassroom' => $userClassroom
        ];

        $userId = '';

        if (isset($_GET['accept'])) {
            $userId = basename($_GET['accept']);
            $userClassroom = (new UserClassroomModel())->findOne([
                'userId' => $userId,
                'classroomId' => $classroom->id,
                'userType' => 'pending'
            ]);

            if ($userClassroom) {
                $userClassroom->loadData([
                    'userType' => 'student'
                ]);

                // echo '<pre>';
                // var_dump($userClassroom);
                // echo '</pre>';


                if ($userClassroom) {
                    if ($userClassroom->setStudent()) {
                        Application::$application->session->setFlash('success', 'User has been accepted in the class!');
                    }
                }
            }
        }

        if (isset($_GET['remove'])) {
            $userId = basename($_GET['remove']);
            $userClassroom = (new UserClassroomModel())->findOne([
                'userId' => $userId,
                'classroomId' => $classroom->id,
                'userType' => 'student'
            ]);

            if ($userClassroom) {
                if ($userClassroom->delete()) {
                    Application::$application->session->setFlash('success', 'User has been removed from the class!');
                }

                $userHomeworks = (new UserHomeworkModel())->findAll([
                    'userId' => $userId,
                    'classroomId' => $classroom->id
                ]);

                if ($userHomeworks) {
                    foreach ($userHomeworks as $userHomework) {
                        if ($userHomework->delete()) {
                        }
                    }
                }

                $userAttendances = (new UserAttendanceModel())->findAll([
                    'userId' => $userId,
                    'classroomId' => $classroom->id
                ]);

                if ($userAttendances) {
                    foreach ($userAttendances as $userAttendance) {
                        if ($userAttendance->delete()) {
                        }
                    }
                }
            }
        }



        $this->setLayout('dashboardheader');
        return $this->render('dashboard/classroom/management', $data);
    }
}
