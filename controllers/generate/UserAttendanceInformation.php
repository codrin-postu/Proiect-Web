<?php

namespace controllers\generate;

use models\ClassroomModel;
use models\UserClassroomModel;
use models\AttendanceCodeModel;
use core\Application;
use models\UserAttendanceModel;

class UserAttendanceInformation
{
    public static function loadTable()
    {
        $output = '';

        $path = Application::$application->request->getPath();
        preg_match('/\d{6,}/', $path, $matches);
        $classroomId = $matches[0];

        $userId = Application::$application->session->get('user');

        $classroomCodes = (new AttendanceCodeModel)->findAll(
            [
                'classroomId' => $classroomId
            ],
            'ORDER BY expires_at DESC'
        );



        foreach ($classroomCodes as $classroomCode) {
            $userAttended = ((new UserAttendanceModel)->findOne([
                'userId' => $userId,
                'classroomId' => $classroomId,
                'codeId' => $classroomCode->id
            ]));

            $codeDate = date('Y/m/d', strtotime($classroomCode->created_at));
            $codeHour = date('H:i', strtotime($classroomCode->created_at));
            $output .=  "
            <div class='class-date'>
            <p>$codeDate</p>
            <p>$codeHour</p>";

            if ($userAttended) {
                $output .= "<p class='attendance-status attended'>Present</p>
                            </div>";
            } else {
                $output .= "<p class='attendance-status'>Absent</p>
                            </div>";
            }

            // echo '<pre>';
            // var_dump($output);
            // echo '</pre>';
            // exit;
        }

        return $output;
    }

    public static function loadDonut()
    {
        $output = '';

        $path = Application::$application->request->getPath();
        preg_match('/\d{6,}/', $path, $matches);
        $classroomId = $matches[0];

        $userId = Application::$application->session->get('user');

        $classroomCodes = (new AttendanceCodeModel)->findAll(
            [
                'classroomId' => $classroomId
            ]
        );

        $totalCodesCount = count($classroomCodes);
        $userAttendedCount = 0;


        foreach ($classroomCodes as $classroomCode) {
            $userAttended = ((new UserAttendanceModel)->findOne([
                'userId' => $userId,
                'classroomId' => $classroomId,
                'codeId' => $classroomCode->id
            ]));

            if ($userAttended) {
                $userAttendedCount++;
            }
        }

        $percentage = round($userAttendedCount / $totalCodesCount * 100, 2);

        $output = "<div class=\"semi-donut margin\"
        style=\"--percentage : $percentage;\">
            <p>$percentage%</p>
        </div>";

        return $output;
    }
}
