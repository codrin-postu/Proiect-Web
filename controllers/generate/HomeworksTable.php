<?php

namespace controllers\generate;

use models\ClassroomModel;
use models\UserClassroomModel;
use core\Application;
use models\AttendanceCodeModel;
use models\HomeworkModel;
use models\LessonModel;
use models\UserAttendanceModel;
use models\UserHomeworkModel;
use models\UserModel;

class HomeworksTable
{
    public static function load(UserClassroomModel $userClassroom)
    {
        $output = '';

        $path = Application::$application->request->getPath();
        preg_match('/\d{6,}/', $path, $matches);
        $classroomId = $matches[0];

        $output .=  "
        <table cellspacing='0'>
        <thead>
            <tr>
                <th scope='col'>Title</th>
                <th scope='col'>Announced</th>
                <th scope='col'>Deadline</th>";

        if ($userClassroom->isStudent()) {
            $output .= "<th scope='col'>Status</th>";
        } else {
            $output .= "<th scope='col'>Unreviewed</th>";
        }


        $output .= "<th scope='col'>Full Detail</th>
            </tr>
        </thead>
        <tbody>";

        $homeworks = (new HomeworkModel)->findAll([
            'classroomId' => $classroomId
        ], 'ORDER BY start_date DESC');

        foreach ($homeworks as $homework) {

            //TODO: Add an emphasis if all students sent homework

            // $usersHomeworks

            $startDate = date('M d, Y H:i', strtotime($homework->start_date));
            $endDate = date('M d, Y H:i', strtotime($homework->end_date));

            $output .= "
                    <td data-label='Title'>$homework->title</td>
                    <td data-label='Announced'>$homework->start_date</td>
                    <td data-label='Deadline'>$homework->end_date</td>";

            if ($userClassroom->isStudent()) {
                switch ($homework->status) {
                    case '0':
                        $output .= "<td data-label='Status' class='fail'>Not Uploaded</td>";
                        break;
                    case '1':
                        $output .= "<td data-label='Status'>Sent</td>";
                        break;
                    case '2':
                        $output .= "<td data-label='Status' class='success'>Reviewed</td>";
                        break;
                    default:
                        $output .= "<td data-label='Status' class='fail'>Not Uploaded</td>";
                }
            } else {
                $output .= "<td data-label='Status'>TODO</td>";
            }
            $output .= "<td data-label='Content'><a href='/dashboard/classroom/$matches[0]/homework/$homework->id'>Click Here</a></td>
                </tr>";
        }

        $output .= " </tbody>
        </table>";

        return $output;
    }

    public static function loadReceived(UserClassroomModel $userClassroom, HomeworkModel $homework)
    {
        $output = '';

        $path = Application::$application->request->getPath();
        preg_match_all('/\d{6,}/', $path, $matches);
        $classroomId = $matches[0][0];
        $homeworkId = $matches[0][1];

        $output .=  "
        <table cellspacing='0'>
        <thead>
            <tr>
                <th scope='col'>Full Name</th>
                <th scope='col'>Uploaded At</th>
                <th scope='col'>Uploaded File</th>
                <th scope='col'>Review It</th>
            </tr>
        </thead>
        <tbody>";

        $usersHomeworks = (new UserHomeworkModel)->findAll([
            'homeworkId' => $homeworkId
        ], 'ORDER BY uploaded_at');

        foreach ($usersHomeworks as $userHomework) {

            $user = (new UserModel)->findOne(['id' => $userHomework->userId]);

            $uploadDate = date('M d, Y H:i', strtotime($userHomework->uploaded_at));
            $fileLocation = dirname(__DIR__) . '/../uploads/' . $userHomework->uploaded_file;
            $output .= "
                    <td data-label='Full Name'>$user->firstName $user->middleName $user->lastName</td>
                    <td data-label='Uploaded At'>$uploadDate</td>
                    <td data-label='Uploaded File'><a href='$fileLocation' download>Download</a></td>";

            $output .= "<td data-label='Review It'><a href='/dashboard/classroom/$classroomId/homework/$homework->id/review'>Click Here</a></td>
                </tr>";
        }

        $output .= " </tbody>
        </table>";

        return $output;
    }
}
