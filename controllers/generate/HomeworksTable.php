<?php

namespace controllers\generate;

use models\ClassroomModel;
use models\UserClassroomModel;
use core\Application;
use models\AttendanceCodeModel;
use models\HomeworkModel;
use models\LessonModel;
use models\UserAttendanceModel;

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
            $output .= "<th scope='col'>Received</th>";
        }


        $output .= "<th scope='col'>Full Detail</th>
            </tr>
        </thead>
        <tbody>";

        $homeworks = (new HomeworkModel)->findAll([
            'classroomId' => $classroomId
        ], 'ORDER BY created_at DESC');
        foreach ($homeworks as $homework) {

            //TODO: Add an emphasis if all students sent homework

            $startDate = date('M d, Y H:i', strtotime($homework->start_date));
            $endDate = date('M d, Y H:i', strtotime($homework->end_date));

            $output .= "
                    <td data-label='Title'>$homework->title</td>
                    <td data-label='Announced'>$homework->start_date</td>
                    <td data-label='Deadline'>$homework->end_date</td>";

            if ($userClassroom->isStudent()) {
                switch ($homework->status) {
                    case 0:
                        $output .= "<td data-label='Status' class='fail>Not Uploaded</td>";
                        break;
                    case 1:
                        $output .= "<td data-label='Status'>Sent</td>";
                        break;
                    case 2:
                        $output .= "<td data-label='Status' class='success'>Reviewed</td>";
                        break;
                    default:
                        $output .= "<td data-label='Status'>Not Uploaded</td>";
                }
            } else {
                $output .= "<th scope='col'>Received</th>";
            }
            $output .= "<td data-label='Content'><a href='/dashboard/classroom/$matches[0]/documentation/$lesson->id'>Click Here</a></td>
                </tr>";
        }

        $output .= " </tbody>
        </table>";

        return $output;
    }
}
