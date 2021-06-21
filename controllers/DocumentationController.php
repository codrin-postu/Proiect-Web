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

class DocumentationController extends Controller
{


    public function __construct()
    {
        $this->registerMiddleware(new RegisterMiddleware([
            'classroomDocumentation',
            'classroomDocumentationCreate',
        ]));

        $this->registerMiddleware(new MemberClassroomMiddleware([
            'classroomDocumentation',
        ]));

        $this->registerMiddleware(new CreatorClassroomMiddleware([
            'classroomDocumentationCreate'
        ]));
    }

    public function classroomDocumentationList(Request $request)
    {
        preg_match('/\d{6,}/', $request->getPath(), $matches);
        $classroom = (new ClassroomModel())->findOne(['id' => $matches[0]]);
        $userClassroom = (new UserClassroomModel())->findOne([
            'userId' => Application::$application->session->get('user'),
            'classroomId' => $classroom->id
        ]);

        $data = [
            'pageTitle' => $classroom->name,
            'relPath' => '../../..',
            'stylesheet' => 'dashboard.css',
            'classroom' => $classroom,
            'userClassroom' => $userClassroom
        ];

        $this->setLayout('dashboardheader');
        return $this->render('dashboard/classroom/classdoclist', $data);
    }

    public function classroomDocumentationCreate(Request $request)
    {
        preg_match('/\d{6,}/', $request->getPath(), $matches);
        $classroom = (new ClassroomModel())->findOne(['id' => $matches[0]]);

        $lesson = new LessonModel();
        $data = [
            'pageTitle' => $classroom->name,
            'relPath' => '../../../..',
            'stylesheet' => 'dashboard.css',
            'classroom' => $classroom,
            'lesson' => $lesson
        ];

        if ($request->isPost()) {

            $lesson->loadData($request->getBody());
            $lesson->loadData([
                'classroomId' => $classroom->id
            ]);

            if ($lesson->validate() && $lesson->save()) {
                Application::$application->session->setFlash('success', 'The lesson has been added!');
                Application::$application->response->redirect("/dashboard/classroom/$classroom->id/documentation");
                exit;
            }
        }


        $this->setLayout('dashboardheader');
        return $this->render('dashboard/classroom/classdoccreate', $data);
    }

    public function classroomDocumentation(Request $request)
    {
        preg_match_all('/\d{1,}/', $request->getPath(), $matches);
        $classroom = (new ClassroomModel())->findOne(['id' => $matches[0][0]]);
        $userClassroom = (new UserClassroomModel())->findOne([
            'userId' => Application::$application->session->get('user'),
            'classroomId' => $classroom->id
        ]);

        $lesson = (new LessonModel())->findOne(['id' => $matches[0][1]]);

        $data = [
            'pageTitle' => $classroom->name,
            'relPath' => '../../../..',
            'stylesheet' => 'dashboard.css',
            'classroom' => $classroom,
            'userClassroom' => $userClassroom,
            'lesson' => $lesson
        ];

        if ($request->isPost() && $userClassroom->isCreator()) {

            if ($lesson->delete()) {
                Application::$application->session->setFlash('success', 'The lesson has been removed!');
                Application::$application->response->redirect("/dashboard/classroom/$classroom->id/documentation");
                exit;
            }
        }

        $this->setLayout('dashboardheader');
        return $this->render('dashboard/classroom/classdoc', $data);
    }
}
