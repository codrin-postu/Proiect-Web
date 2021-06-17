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
        $classroomId = ClassroomModel::getClassById($this->classroomId);
        if (!$classroomId) {
            $this->addError('classroomId', 'Classroom ID does not exist or is incorrect');
            return false;
        }

        return true;
    }
}
