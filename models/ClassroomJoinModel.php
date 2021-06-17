<?php

namespace models;

use core\Application;
use core\Model;

class ClassroomJoinModel extends Model
{
    public string $classroomId = '';

    public function rules(): array
    {
        return [
            'classroomId' => [self::RULE_NUMBER]
        ];
    }

    public function finalize()
    {
        $classroom = ClassroomModel::getClassById($this->classroomId);
        if (!$classroom) {
            $this->addError('classroomId', 'Classroom ID does not exist or is incorrect');
            return false;
        }

        $userId = Application::$application->session->get('user');

        // echo '<pre>';
        // var_dump($userId);
        // var_dump($this->classroomId);
        // echo '</pre>';
        // exit;


        $userClassroom = (new UserClassroomModel)->findOne(['userId' => $userId, 'classroomId' => $this->classroomId]);

        if ($userClassroom) {
            if ($userClassroom->type === 'pending') {
                $this->addError('classroomId', 'You have already sent in the request to join the classroom. Please wait for approval!');
            } else if ($userClassroom->type === 'student') {
                $this->addError('classroomId', 'You already joined this classroom!');
            }

            return false;
        }

        return true;
    }
}
