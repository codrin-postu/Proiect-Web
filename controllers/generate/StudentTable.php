<?php

namespace controllers\generate;

use core\Application;
use models\GradeModel;
use models\LessonModel;
use models\UserClassroomModel;
use models\UserModel;

class StudentTable
{
    public static function loadStudents()
    {
        $output = '';

        $path = Application::$application->request->getPath();
        preg_match('/\d{6,}/', $path, $matches);
        $classroomId = $matches[0];

        $output .=  "
        <table cellspacing='0'>
        <thead>
            <tr>
                <th scope='col'>Full Name</th>
                <th scope='col'>Email</th>
                <th scope='col'>Manage</th>
            </tr>
        </thead>
        <tbody>";

        $usersClassroom = (new UserClassroomModel())->findAll(['classroomId' => $classroomId, 'userType' => 'student']);
        foreach ($usersClassroom as $usersClassroom) {

            $user = (new UserModel())->findOne(['id' => $usersClassroom->userId]);

            $output .= "
                    <td data-label='Full Name'>$user->firstName $user->middleName $user->lastName</td>
                    <td data-label='Email'>$user->email</td>
                    <td data-label='Manage'><a href='/dashboard/classroom/$matches[0]/students?remove=$user->id'>Remove</a></td>
                    
                </tr>";
        }

        $output .= " </tbody>
        </table>";

        return $output;
    }

    public static function loadPending()
    {
        $output = '';

        $path = Application::$application->request->getPath();
        preg_match('/\d{6,}/', $path, $matches);
        $classroomId = $matches[0];

        $output .=  "
        <table cellspacing='0'>
        <thead>
            <tr>
                <th scope='col'>Full Name</th>
                <th scope='col'>Email</th>
                <th scope='col'>Manage</th>
            </tr>
        </thead>
        <tbody>";

        $usersClassroom = (new UserClassroomModel())->findAll(['classroomId' => $classroomId, 'userType' => 'pending']);
        foreach ($usersClassroom as $usersClassroom) {

            $user = (new UserModel())->findOne(['id' => $usersClassroom->userId]);

            $output .= "
                    <td data-label='Full Name'>$user->firstName $user->middleName $user->lastName</td>
                    <td data-label='Email'>$user->email</td>
                    <td data-label='Manage'><a href='/dashboard/classroom/$matches[0]/students?accept=$user->id'>Accept</a></a></td>
                    
                </tr>";
        }

        $output .= " </tbody>
        </table>";

        return $output;
    }
}
