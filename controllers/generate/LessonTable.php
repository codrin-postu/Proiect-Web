<?php

namespace controllers\generate;

use models\ClassroomModel;
use models\UserClassroomModel;
use core\Application;
use models\AttendanceCodeModel;
use models\LessonModel;
use models\UserAttendanceModel;

class LessonTable
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
                <th scope='col'>No.</th>
                <th scope='col'>Lesson</th>
                <th scope='col'>Posted</th>
                <th scope='col'>Documentation</th>
            </tr>
        </thead>
        <tbody>";

        $lessons = (new LessonModel)->findAll([
            'classroomId' => $classroomId
        ], 'ORDER BY created_at');
        foreach ($lessons as $lesson) {

            //TODO: Add an emphasis if all students attended

            $date = date('M d, Y', strtotime($lesson->created_at));

            $output .= "
                    <td data-label='No.'>$lesson->number</td>
                    <td data-label='Lesson'>$lesson->title</td>
                    <td data-label='Posted'>$date</td>
                    <td data-label='Content'><a href='/dashboard/classroom/$matches[0]/documentation/$lesson->id'>Click Here</a></td>
                </tr>";
        }

        $output .= " </tbody>
        </table>";

        return $output;
    }
}
