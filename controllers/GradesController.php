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
use Exception;
use models\EquationModel;
use models\HomeworkModel;
use models\LessonModel;
use models\UserAttendanceModel;
use models\UserHomeworkModel;
use models\UserModel;
use models\GradeModel;
use ParseError;

class GradesController extends Controller
{


    public function __construct()
    {
        $this->registerMiddleware(new RegisterMiddleware([
            'classroomGrades',
        ]));

        $this->registerMiddleware(new MemberClassroomMiddleware([
            'classroomGrades',
        ]));
    }

    public function classroomGrades(Request $request)
    {
        preg_match('/\d{6,}/', $request->getPath(), $matches);
        $classroom = (new ClassroomModel())->findOne(['id' => $matches[0]]);
        $userClassroom = (new UserClassroomModel())->findOne([
            'userId' => Application::$application->session->get('user'),
            'classroomId' => $classroom->id
        ]);

        $equation = (new EquationModel())->findOne(['classroomId' => $classroom->id]);

        if (!$equation) {
            $equation = new EquationModel();
        }


        $data = [
            'pageTitle' => $classroom->name,
            'relPath' => '../../..',
            'stylesheet' => 'dashboard.css',
            'classroom' => $classroom,
            'userClassroom' => $userClassroom,
            'equation' => $equation
        ];

        if ($request->isPost() && $userClassroom->isCreator()) {
            $equation->loadData($request->getBody());

            $input = $equation->equation;

            $usersClassroom = (new UserClassroomModel())->findAll(['classroomId' => $classroom->id, 'userType' => 'student']);


            $userGrades = [];
            $userGradeCount = $equation->gradeCount;

            if (!$equation->validate()) {
                $this->setLayout('dashboardheader');
                return $this->render('dashboard/classroom/grades', $data);
                exit;
            }

            for ($i = 0; $i < count($usersClassroom); $i++) {
                $usersGrades[$i] = (new GradeModel())->findAll(['classroomId' => $classroom->id, 'userId' => $usersClassroom[$i]->userId]);
                $j = $i + 1;
                foreach ($usersGrades[$i] as $key => $value) {
                    if ($value->type === 'FinalGrade') {
                        echo "happened!\n";
                    } else {
                        $userGrades[$i]["grade_" . $j] = $value->grade;
                        $j++;
                    }
                }
                if (count($userGrades[$i]) != $userGradeCount) {
                    exit;
                    $equation->addError('gradeCount', 'Not all students have the same number of grades!');
                    $this->setLayout('dashboardheader');
                    return $this->render('dashboard/classroom/grades', $data);
                    exit;
                }
            }

            $result = '';

            $tokens = token_get_all("<?php {$input}");
            $expr = '';

            foreach ($tokens as $token) {

                if (is_string($token)) {

                    if (in_array($token, array('(', ')', 'floor', 'ceil', 'round', '+', '-', '/', '*'), true))
                        $expr .= $token;

                    continue;
                }

                list($id, $text) = $token;

                if (in_array($id, array(T_DNUMBER, T_LNUMBER, 311))) {
                    if ($id === 311) {
                        switch ($text) {
                            case 'floor':
                            case 'ceil':
                            case 'round':
                                $expr .= $text;
                                break;
                            default:
                                preg_match('/grade_\d+/', $text, $matches);
                                $expr .= $text;
                        }
                    } else {
                        $expr .= $text;
                    }
                }
            }

            for ($i = 0; $i < count($usersClassroom); $i++) {
                $array = $userGrades[$i];
                preg_match_all('/grade_\d+/', $expr, $matches);
                $expr = preg_replace_callback('/grade_\d+/', function ($m) use ($array) {

                    return isset($array[$m[0]]) ? $array[$m[0]] : $m[0];
                }, $expr);

                try {
                    eval("\$result = {$expr};");
                } catch (ParseError $e) {
                    $equation->addError('equation', 'There was an error with the equation!');
                    $this->setLayout('dashboardheader');
                    return $this->render('dashboard/classroom/grades', $data);
                    exit;
                }


                $newGrade = (new GradeModel())->findOne([
                    'userId' => $usersClassroom[$i]->userId,
                    'classroomId' => $usersClassroom[$i]->classroomId,
                    'type' => 'FinalGrade'
                ]);

                if ($newGrade) {
                    $newGrade->loadData([
                        'grade' => $result
                    ]);

                    if (!$newGrade->updateFinalColumn()) {
                        $equation->addError('equation', 'There was an issue with the equation');
                        $this->setLayout('dashboardheader');
                        return $this->render('dashboard/classroom/grades', $data);
                        exit;
                    }
                } else {
                    $newGrade = new GradeModel();

                    $newGrade->loadData([
                        'grade' => $result,
                        'userId' => $usersClassroom[$i]->userId,
                        'classroomId' => $usersClassroom[$i]->classroomId,
                        'type' => 'FinalGrade'
                    ]);

                    if (!$newGrade->save()) {
                        $equation->addError('equation', 'There was an issue with the equation');
                        $this->setLayout('dashboardheader');
                        return $this->render('dashboard/classroom/grades', $data);
                        exit;
                    }
                }
            }


            Application::$application->session->setFlash('success', 'The final grade has been added!');
            Application::$application->response->redirect("/dashboard/classroom/$classroom->id/grades");
            exit;
        }

        $this->setLayout('dashboardheader');
        return $this->render('dashboard/classroom/grades', $data);
    }

    public function classroomGradesAdd(Request $request)
    {
        preg_match_all('/\d{6,}/', $request->getPath(), $matches);
        $classroom = (new ClassroomModel())->findOne(['id' => $matches[0][0]]);

        $grade = new GradeModel();

        $usersClassroom = (new UserClassroomModel())->findAll([
            'classroomId' => $classroom->id,
            'userType' => 'student'
        ]);
        $usersIds = ['userId'];
        $usersNames = ['Select Student*'];
        $usersAttributes = ['disabled selected'];

        foreach ($usersClassroom as $userClassroom) {
            $user = (new UserModel())->findOne(['id' => $userClassroom->userId]);

            array_push($usersIds, $user->id);
            array_push(
                $usersNames,
                $user->firstName .
                    ' ' . $user->middleName .
                    ' ' . $user->lastName
            );
            array_push($usersAttributes, '');
        }

        $data = [
            'pageTitle' => $classroom->name,
            'relPath' => '../../../../..',
            'stylesheet' => 'dashboard.css',
            'classroom' => $classroom,
            'grade' => $grade,
            'usersIds' => $usersIds,
            'usersNames' => $usersNames,
            'usersAttributes' => $usersAttributes
        ];

        if ($request->isPost()) {

            $grade->loadData($request->getBody());
            $grade->loadData([
                'classroomId' => $classroom->id
            ]);

            if ($grade->validate() && $grade->save()) {
                Application::$application->session->setFlash('success', 'The grade has been added!');
                Application::$application->response->redirect("/dashboard/classroom/$classroom->id/grades");
                exit;
            }
        }

        $this->setLayout('dashboardheader');
        return $this->render('dashboard/classroom/gradesadd', $data);
    }
}
