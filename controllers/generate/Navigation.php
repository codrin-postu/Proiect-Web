<?php

namespace controllers\generate;

use models\ClassroomModel;
use models\UserClassroomModel;
use core\Application;

class Navigation
{
    public static function loadClasses()
    {
        $userId = Application::$application->session->get('user');
        $userClassrooms = (new UserClassroomModel())->findAll(['userId' => $userId]);

        preg_match('/\d{6,}/', Application::$application->request->getPath(), $matches);

        preg_match('/[a-zA-Z]+$/', Application::$application->request->getPath(), $path);

        $currentClassroom = '';
        $currentPath = '';


        $output = '';

        foreach ($userClassrooms as $userClassroom) {
            $classroom = (new ClassroomModel())->findOne(['id' => $userClassroom->classroomId]);

            $output .=  "
                <div class=\"nav-class\">
                    <div class=\"class-select\">
                    <i class=\"fas fa-chevron-right\"></i>
                    <span class=\"class-title\">$classroom->name</span>
                </div>";

            if ($userClassroom->userType === 'pending') {
                $output .= "<div class=\"class-links\">
                        <a href=\"#\" class=\"nav-link\">
                            <i class=\"fas fa-book-open\"></i>
                            <span class=\"nav-name\">Request Pending</span>
                        </a>
                    </div>
                </div>";
                continue;
            }
            $output .= "<div class=\"class-links\">
                            <a href=\"/dashboard/classroom/$classroom->id/info\" class=\"nav-link\">
                                <i class=\"fas fa-book-open\"></i>
                                <span class=\"nav-name\">Class Information</span>
                            </a>
                            <a href=\"/dashboard/classroom/$classroom->id/attendance\" class=\"nav-link\">
                                <i class=\"fas fa-clock\"></i>
                                <span class=\"nav-name\">Check Attendance</span>
                            </a>
                            <a href=\"/dashboard/classroom/$classroom->id/documentation\" class=\"nav-link\">
                                <i class=\"fas fa-highlighter\"></i>
                                <span class=\"nav-name\">Class Documentation</span>
                            </a>
                            <a href=\"/dashboard/classroom/$classroom->id/homework\" class=\"nav-link\">
                                <i class=\"fas fa-paperclip\"></i>
                                <span class=\"nav-name\">Homework</span>
                            </a>
                            <a href=\"/dashboard/classroom/$classroom->id/grades\" class=\"nav-link\">
                                <i class=\"fas fa-percentage\"></i>
                                <span class=\"nav-name\">Grades</span>
                            </a>
                            <a href=\"/dashboard/classroom/$classroom->id/students\" class=\"nav-link\">
                                <i class=\"fas fa-user\"></i>
                                <span class=\"nav-name\">Students & Management</span>
                            </a>
                        </div>
                    </div>";
        }

        return $output;
    }
}
