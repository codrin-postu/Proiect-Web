<?php

namespace controllers\generate;

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

        $output .=  "
        <table cellspacing='0'>
        <thead>
            <tr>
                <th scope='col'>Code</th>
                <th scope='col'>Created At</th>
                <th scope='col'>Expires In</th>
                <th scope='col'>Students Attended</th>
            </tr>
        </thead>
        <tbody>";

        $classroomCodes = (new AttendanceCodeModel)->findAll([
            'classroomId' => $classroomId
        ], 'ORDER BY expires_at DESC');
        foreach ($classroomCodes as $classroomCode) {

            //TODO: Add an emphasis if all students attended

            $attendedStudents = (new GeneratedCodesTable)
                ->getStudentsAttendedCount($classroomId, $classroomCode->id);

            $expiresIn = (strtotime($classroomCode->expires_at) - (time() + 3600));

            if (time() + 3600 < strtotime($classroomCode->expires_at)) {
                $output .= '<tr class="active-code">';
                $expiresInFormatted =
                    (int) ($expiresIn / 60) . " Minutes and "
                    . $expiresIn % 60 . " Seconds";
            } else {
                $output .=  '<tr>';
                $expiresInFormatted = "Expired";
            }

            $output .= "
                    <td data-label='Code'>$classroomCode->code</td>
                    <td data-label='Created At'>$classroomCode->created_at</td>
                    <td data-label='Expires In'>$expiresInFormatted</td>
                    <td data-label='Students Attended'>$attendedStudents</td>
                </tr>";
        }

        $output .= " </tbody>
        </table>";

        return $output;
    }

    public function getTotalStudents($classroomId)
    {
        $usersClassroom = (new UserClassroomModel())
            ->findAll(['classroomId' => $classroomId]);

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
        $usersAttended = (new UserAttendanceModel())
            ->findAll([
                'classroomId' => $classroomId,
                'codeId' => $codeId
            ]);

        return count($usersAttended);
    }
}
