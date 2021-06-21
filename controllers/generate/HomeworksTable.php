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

                $userHomework = (new UserHomeworkModel())->findOne([
                    'userId' => $userClassroom->userId,
                    'homeworkId' => $homework->id
                ]);

                if (!$userHomework) {
                    $status = 0;
                } else {
                    $status = $userHomework->status;
                }

                switch ($status) {
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
                $usersHomeworks = (new UserHomeworkModel())->findAll(['homeworkId' => $homework->id, 'status' => '1']);
                // echo '<pre>';
                // var_dump($usersHomeworks);
                // echo '</pre>';
                // exit;

                if (!$usersHomeworks) {
                    $count = 0;
                    $output .= "<td data-label='Status' class='success'>$count</td>";
                } else {
                    $count = count($usersHomeworks);
                    $output .= "<td data-label='Status' class='fail'>$count</td>";
                }
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
                <th scope='col'>Status</th>
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
            $status = '';
            switch ($userHomework->status) {
                case '1':
                    $status = 'Not Reviewed';
                    break;
                case '2':
                    $status = 'Reviewed';
                    break;
            }
            $fileLocation = dirname(__DIR__) . '/../uploads/' . $userHomework->uploaded_file;
            $output .= "
                    <td data-label='Full Name'>$user->firstName $user->middleName $user->lastName</td>
                    <td data-label='Uploaded At'>$uploadDate</td>
                    <td data-label='Uploaded File'><a href='download?file=$userHomework->uploaded_file'>Download</a></td>";

            if ($status === 'Reviewed') {
                $output .= "<td data-label='Status' class='success'>$status</td>
                 <td data-label='Review It'></td>
                    </tr>";
            } else {
                $output .= "<td data-label='Status'>$status</td>
                <td data-label='Review It'><a href='/dashboard/classroom/$classroomId/homework/$homework->id/review?student=$userHomework->userId'>Click Here</a></td>
                </tr>";
            }
        }

        $output .= " </tbody>
        </table>";

        return $output;
    }
}
