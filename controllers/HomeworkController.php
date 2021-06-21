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

class HomeworkController extends Controller
{


    public function __construct()
    {
        $this->registerMiddleware(new RegisterMiddleware([
            'classroomHomework',
            'classroomHomeworkCreate',
            'classroomHomeworkReview'
        ]));

        $this->registerMiddleware(new MemberClassroomMiddleware([
            'classroomHomework',
        ]));

        $this->registerMiddleware(new CreatorClassroomMiddleware([
            'classroomHomeworkCreate',
            'classroomHomeworkReview'
        ]));
    }

    public function classroomHomeworkList(Request $request)
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
        return $this->render('dashboard/classroom/homeworklist', $data);
    }

    public function classroomHomeworkCreate(Request $request)
    {
        preg_match('/\d{6,}/', $request->getPath(), $matches);
        $classroom = (new ClassroomModel())->findOne(['id' => $matches[0]]);

        $homework = new HomeworkModel();
        $data = [
            'pageTitle' => $classroom->name,
            'relPath' => '../../../..',
            'stylesheet' => 'dashboard.css',
            'classroom' => $classroom,
            'homework' => $homework
        ];

        if ($request->isPost()) {

            $homework->loadData($request->getBody());
            $homework->loadData([
                'classroomId' => $classroom->id
            ]);

            if ($homework->validate() && $homework->save()) {
                Application::$application->session->setFlash('success', 'The lesson has been added!');
                Application::$application->response->redirect("/dashboard/classroom/$classroom->id/homework");
                exit;
            }
        }


        $this->setLayout('dashboardheader');
        return $this->render('dashboard/classroom/homeworkcreate', $data);
    }

    public function classroomHomework(Request $request)
    {
        preg_match_all('/\d{1,}/', $request->getPath(), $matches);
        $classroom = (new ClassroomModel())->findOne(['id' => $matches[0][0]]);
        $userClassroom = (new UserClassroomModel())->findOne([
            'userId' => Application::$application->session->get('user'),
            'classroomId' => $classroom->id
        ]);

        $homework = (new HomeworkModel())->findOne(['id' => $matches[0][1]]);

        $userHomework = (new UserHomeworkModel())->findOne([
            'homeworkId' => $homework->id,
            'userId' => Application::$application->session->get('user')
        ]);

        if (!$userHomework) {
            $userHomework = new UserHomeworkModel();
        }

        // $timeLeft = '';

        // if (strtotime($homework->end_date) - time() > 0) {
        //     $timeLeft = date('d \D\a\y\s H:i \H\o\u\r\s', strtotime($homework->end_date) - time());
        // } else {
        //     $timeLeft = 'Expired';
        // }
        // echo "<pre>";
        // var_dump(date('Y-m-d H:i', strtotime($homework->end_date)));
        // var_dump(strtotime($homework->end_date) - time());
        // var_dump(date('Y-m-d H:i', strtotime($homework->end_date) - time()));
        // var_dump($timeLeft);
        // echo "</pre>";
        // exit;

        $grade = new GradeModel();

        $data = [
            'pageTitle' => $classroom->name,
            'relPath' => '../../../..',
            'stylesheet' => 'dashboard.css',
            'classroom' => $classroom,
            'userClassroom' => $userClassroom,
            'homework' => $homework,
            'userHomework' => $userHomework,
            'grade' => $grade
        ];

        if ($request->isPost() && $userClassroom->isStudent()) {

            $userHomework->loadData($request->getBody());
            $userHomework->loadData([
                'uploaded_file' => $_FILES['uploaded_file']['name'],
                'homeworkId' => $homework->id,
                'userId' => Application::$application->session->get('user'),
                'gradeId' => '0',
                'status' => '1'
            ]);

            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES['uploaded_file']['name']);
            $uploadOk = 1;
            $zipFileType =  strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if ($zipFileType !== 'zip') {
                $userHomework->addError('uploaded_file', 'There was a problem uploading your file');
                $uploadOk = 0;
            } else {

                $check = filesize($_FILES['uploaded_file']['tmp_name']);

                if ($check === false) {
                    $uploadOk = 0;
                } else {
                    $uploadOk = 1;
                }

                if (file_exists($target_file)) {

                    $uploadOk = 0;
                }
                if ($_FILES['uploaded_file']['size'] > 20971520) {
                    $uploadOk = 0;
                }

                if ($uploadOk === 0) {
                    $userHomework->addError('uploaded_file', 'There was a problem uploading your file');
                } else {
                    if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $target_file) && $userHomework->save()) {
                        Application::$application->session->setFlash('success', 'Your homework has been uploaded');
                        Application::$application->response->redirect("/dashboard/classroom/$classroom->id/homework/$homework->id");
                    } else {
                        $userHomework->addError('uploaded_file', 'There was a problem uploading your file');
                    }
                }
            }
        }


        if ($request->isPost() && $userClassroom->isCreator()) {

            if ($homework->delete()) {
                Application::$application->session->setFlash('success', 'The lesson has been removed!');
                Application::$application->response->redirect("/dashboard/classroom/$classroom->id/homework");
                exit;
            }
        }

        $this->setLayout('dashboardheader');
        return $this->render('dashboard/classroom/homework', $data);
    }

    public function classroomHomeworkReceived(Request $request)
    {
        preg_match_all('/\d{6,}/', $request->getPath(), $matches);
        $classroom = (new ClassroomModel())->findOne(['id' => $matches[0][0]]);
        $homework = (new HomeworkModel())->findOne(['id' => $matches[0][1]]);

        $userClassroom = (new UserClassroomModel())->findOne([
            'userId' => Application::$application->session->get('user'),
            'classroomId' => $classroom->id
        ]);

        $data = [
            'pageTitle' => $classroom->name,
            'relPath' => '../../../../..',
            'stylesheet' => 'dashboard.css',
            'classroom' => $classroom,
            'userClassroom' => $userClassroom,
            'homework' => $homework
        ];

        $this->setLayout('dashboardheader');
        return $this->render('dashboard/classroom/homeworkreceived', $data);
    }

    public function classroomHomeworkReview(Request $request)
    {
        preg_match_all('/\d{6,}/', $request->getPath(), $matches);
        $classroom = (new ClassroomModel())->findOne(['id' => $matches[0][0]]);
        $homework = (new HomeworkModel())->findOne(['id' => $matches[0][1]]);

        $userId = basename($_GET['student']);
        $user = (new UserModel())->findOne(['id' => $userId]);

        $userHomework = (new UserHomeworkModel())->findOne([
            'userId' => $userId,
            'homeworkId' => $homework->id
        ]);

        $grade = new GradeModel();

        if (!$userHomework) {
            throw new NotFoundException();
        }

        $data = [
            'pageTitle' => $classroom->name,
            'relPath' => '../../../../..',
            'stylesheet' => 'dashboard.css',
            'classroom' => $classroom,
            'userHomework' => $userHomework,
            'homework' => $homework,
            'grade' => $grade,
            'user' => $user
        ];

        if ($request->isPost()) {

            $grade->loadData($request->getBody());
            $grade->loadData([
                'homeworkId' => $homework->id,
                'userId' => $userHomework->userId,
                'classroomId' => $classroom->id
            ]);

            $userHomework->loadData([
                'status' => '2'
            ]);

            if ($grade->validate() && $grade->save()) {
                $grade = $grade->findOne([
                    'userId' => $userHomework->userId,
                    'classroomId' => $classroom->id,
                    'homeworkId' => $userHomework->homeworkId
                ]);

                $userHomework->loadData(['gradeId' => $grade->id]);

                if ($userHomework->updateColumn()) {
                    Application::$application->session->setFlash('success', 'The homework has been reviewed!');
                    Application::$application->response->redirect("/dashboard/classroom/$classroom->id/homework/$homework->id/received");
                    exit;
                }
            }
        }

        $this->setLayout('dashboardheader');
        return $this->render('dashboard/classroom/homeworkreview', $data);
    }

    public function classroomHomeworkDownload(Request $request)
    {
        preg_match_all('/\d{6,}/', $request->getPath(), $matches);
        $classroom = (new ClassroomModel())->findOne(['id' => $matches[0][0]]);
        $homework = (new HomeworkModel())->findOne(['id' => $matches[0][1]]);


        if (!empty($_GET['file'])) {
            // Security, down allow to pass ANY PATH in your server
            $fileName = basename($_GET['file']);
        } else {
            return;
        }

        $filePath = dirname(__DIR__) . '/uploads/' . $fileName;

        // echo "<pre>";
        // var_dump($filePath);
        // echo "</pre>";
        // exit;

        if (!file_exists($filePath)) {
            echo "Something went wrong!";
        }

        header("Content-disposition: attachment; filename=" . $fileName);
        header("Content-type: application/zip");
        readfile($filePath);

        $userClassroom = (new UserClassroomModel())->findOne([
            'userId' => Application::$application->session->get('user'),
            'classroomId' => $classroom->id
        ]);

        $data = [
            'pageTitle' => $classroom->name,
            'relPath' => '../../../../..',
            'stylesheet' => 'dashboard.css',
            'classroom' => $classroom,
            'userClassroom' => $userClassroom,
            'homework' => $homework
        ];
    }
}
