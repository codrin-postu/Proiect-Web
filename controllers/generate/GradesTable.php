<?php

namespace controllers\generate;

use core\Application;
use models\GradeModel;
use models\LessonModel;
use models\UserClassroomModel;
use models\UserModel;

class GradesTable
{
    public static function loadStudent()
    {
        $output = '';

        $path = Application::$application->request->getPath();
        preg_match('/\d{6,}/', $path, $matches);
        $classroomId = $matches[0];

        $output .=  "
        <table cellspacing='0'>
        <thead>
            <tr>
                <th scope='col'>Type</th>
                <th scope='col'>Date</th>
                <th scope='col'>Grade</th>
                <th scope='col'>Detail</th>
            </tr>
        </thead>
        <tbody>";

        $grades = (new GradeModel)->findAll([
            'classroomId' => $classroomId,
            'userId' => Application::$application->session->get('user')
        ], 'ORDER BY added_at DESC');
        foreach ($grades as $grade) {

            //TODO: Add an emphasis if all students attended

            $date = date('M d, Y', strtotime($grade->added_at));

            $output .= "
                    <td data-label='Type'>$grade->type</td>
                    <td data-label='Date'>$date</td>
                    <td data-label='Grade'>$grade->grade</td>
                    <td data-label='Detail'>$grade->detail</td>
                </tr>";
        }

        $output .= " </tbody>
        </table>";

        return $output;
    }

    public static function loadAcademic()
    {
        $output = '';

        $path = Application::$application->request->getPath();
        preg_match('/\d{6,}/', $path, $matches);
        $classroomId = $matches[0];

        $output .=  "
        <table cellspacing='0'>
        <thead>
            <tr>
                <th scope='col'>Student</th>
                <th scope='col'>Grades</th>
                <th scope='col'>Final Grade</th>
            </tr>
        </thead>
        <tbody>";

        $usersClassroom = (new UserClassroomModel())->findAll([
            'classroomId' => $classroomId,
            'userType' => 'student'
        ]);

        foreach ($usersClassroom as $userClassroom) {

            $student = (new UserModel())->findOne(['id' => $userClassroom->userId]);
            $grades = (new GradeModel())->findAll(['userId' => $userClassroom->userId]);
            $finalGrade = 'N/A';

            $output .= "
                    <td data-label='Student'>$student->firstName $student->middleName $student->lastName</td>
                    <td data-label='Grades'>";
            foreach ($grades as $grade) {
                if ($grade->type !== 'FinalGrade') {
                    $output .= $grade->grade . ", ";
                } elseif ($grade->type === 'FinalGrade') {
                    $finalGrade = $grade->grade;
                }
            }

            $output .= "</td>
                    <td data-label='Final Grade'>$finalGrade</td>
                </tr>";
        }

        $output .= " </tbody>
        </table>";

        return $output;
    }
}
