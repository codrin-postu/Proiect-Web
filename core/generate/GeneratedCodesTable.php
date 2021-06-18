<?php

namespace core\generate;

use models\ClassroomModel;
use models\UserClassroomModel;
use core\Application;
use models\AttendanceCodeModel;
use models\UserAttendanceModel;

class GeneratedCodesTable
{
    public static function load()
    {
        $output = '';

        $path = Application::$application->request->getPath();
        preg_match('/\d{6,}/', $path, $matches);
        $classroomId = $matches[0];

        $totalClassStudents = (new GeneratedCodesTable)->getTotalStudents($classroomId);

        $output .=  "
        <table cellspacing='0'>
        <thead>
            <tr>
                <th scope='col'>Code</th>
                <th scope='col'>Created At</th>
                <th scope='col'>Expires At</th>
                <th scope='col'>Students Attended</th>
            </tr>
        </thead>
        <tbody>";

        $classroomCodes = (new AttendanceCodeModel)->findAll(['classroomId' => $classroomId], 'ORDER BY expires_at DESC');
        foreach ($classroomCodes as $classroomCode) {

            $attendedStudents = (new GeneratedCodesTable)->getStudentsAttendedCount($classroomId, $classroomCode->id);

            $output .= " <tr>
            <td data-label='Code'>$classroomCode->code</td>
            <td data-label='Created At'>$classroomCode->created_at</td>
            <td data-label='Expires At'>$classroomCode->expires_at</td>
            <td data-label='Students Attended' class='success'>$attendedStudents/$totalClassStudents</td>
        </tr>";
        }

        $output .= " </tbody>
        </table>";

        return $output;
    }

    public function getTotalStudents($classroomId)
    {
        $usersClassroom = (new UserClassroomModel())->findAll(['classroomId' => $classroomId]);

        $students = 0;

        foreach ($usersClassroom as $userClassroom) {
            if ($userClassroom->type === 'student') {
                $students++;
            }
        }

        return $students;
    }

    public function getStudentsAttendedCount($classroomId, $codeId)
    {
        $usersAttended = (new UserAttendanceModel())->findAll(['classroomId' => $classroomId, 'codeId' => $codeId]);

        return count($usersAttended);
    }
}
