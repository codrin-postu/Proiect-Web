<?php

namespace core\generate;

use models\ClassroomModel;
use models\UserClassroomModel;
use core\Application;

class GeneratedCodesTable
{
    public static function load()
    {
        $userId = Application::$application->session->get('user');
        $userClassrooms = (new UserClassroomModel())->findAll(['userId' => $userId]);

        $output = '';

        foreach ($userClassrooms as $userClassroom) {
            $classroom = (new ClassroomModel())->findOne(['id' => $userClassroom->classroomId]);

            $output .=  "
                <div class=\"nav-class\">
                    <div class=\"class-select\">
                    <i class=\"fas fa-chevron-right\"></i>
                    <span class=\"class-title\">$classroom->name</span>
                </div>";
        }

        return $output;

        // echo '<pre>';
        // var_dump($userId);
        // var_dump($userClassrooms[0]);
        // echo '</pre>';
        // exit;

    }
}
