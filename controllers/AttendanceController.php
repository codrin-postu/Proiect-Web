<?php

namespace controllers;

use core\Controller;
use core\Request;
use middlewares\AcademicMiddleware;
use middlewares\RegisterMiddleware;
use middlewares\MemberClassroomMiddleware;
use middlewares\CreatorClassroomMiddleware;
use models\ClassroomModel;
use models\UserClassroomModel;
use models\AttendanceCodeModel;
use core\Application;
use core\exceptions\NotFoundException;
use models\EquationModel;
use models\HomeworkModel;
use models\LessonModel;
use models\UserAttendanceModel;
use models\UserHomeworkModel;
use models\UserModel;
use models\GradeModel;

class AttendanceController extends Controller
{


    public function __construct()
    {
        $this->registerMiddleware(new RegisterMiddleware([
            'classroomAttendance',
        ]));

        $this->registerMiddleware(new MemberClassroomMiddleware([
            'classroomAttendance'
        ]));
    }

    public function classroomAttendance(Request $request)
    {
        preg_match('/\d{6,}/', $request->getPath(), $matches);
        $classroom = (new ClassroomModel())->findOne(['id' => $matches[0]]);
        $userClassroom = (new UserClassroomModel())->findOne([
            'userId' => Application::$application->session->get('user'),
            'classroomId' => $classroom->id
        ]);

        $userAttendance = new UserAttendanceModel();

        $code = new AttendanceCodeModel();
        $data = [
            'pageTitle' => $classroom->name,
            'relPath' => '../../..',
            'stylesheet' => 'dashboard.css',
            'classroom' => $classroom,
            'userClassroom' => $userClassroom,
            'code' => $code,
            'userAttendance' => $userAttendance
        ];

        if ($request->isPost() && $userClassroom->isStudent()) {

            $userAttendance->loadData($request->getBody());
            $userAttendance->loadData([
                'classroomId' => $classroom->id,
                'userId' => Application::$application->session->get('user')
            ]);

            if ($userAttendance->validate() && $userAttendance->save()) {
                Application::$application->session->setFlash('success', 'The code has been generated!');
                // Application::$application->response->redirect("/dashboard/classroom/$classroom->id/attendance");
            }
        }

        if ($request->isPost() && $userClassroom->isCreator()) {

            $code->loadData($request->getBody());
            $code->loadData([
                'classroomId' => $classroom->id
            ]);

            if ($code->save()) {
                Application::$application->session->setFlash('success', 'The code has been generated!');
                // Application::$application->response->redirect("/dashboard/classroom/$classroom->id/attendance");
            }
        }

        $this->setLayout('dashboardheader');
        return $this->render('dashboard/classroom/attendance', $data);
    }

    public function classroomAttendanceList(Request $request)
    {
        preg_match_all('/\d{1,}/', $request->getPath(), $matches);
        $classroom = (new ClassroomModel())->findOne(['id' => $matches[0][0]]);
        $userClassroom = (new UserClassroomModel())->findOne([
            'userId' => Application::$application->session->get('user'),
            'classroomId' => $classroom->id
        ]);

        $code = (new AttendanceCodeModel())->findOne(['id' => $matches[0][1]]);

        $usersAttended = (new UserAttendanceModel())->findAll([
            'classroomId' => $classroom->id,
            'codeId' => $code->id
        ]);

        $data = [
            'pageTitle' => $classroom->name,
            'relPath' => '../../../../..',
            'stylesheet' => 'dashboard.css',
            'classroom' => $classroom,
            'userClassroom' => $userClassroom,
            'code' => $code,
            'usersAttended' => $usersAttended
        ];

        $this->setLayout('dashboardheader');
        return $this->render('dashboard/classroom/attendancelist', $data);
    }
}
