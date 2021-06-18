<?php

namespace models;

use core\DatabaseModel;
use core\Model;

class UserAttendanceModel extends DatabaseModel
{

    public string $id = '0';
    public string $userId = '';
    public string $classroomId = '';
    public string $code = '';
    public string $codeId = '';
    public string $attended_at = '';

    public function primaryKey(): string
    {
        return 'id';
    }

    public function tableName(): string
    {
        return 'attendance';
    }

    public function columnsToInput(): array
    {
        return ['userId', 'classroomId', 'codeId'];
    }

    public function inputs(): array
    {
        return ['userId', 'classroomId', 'codeId'];
    }

    public function save()
    {
        $classroomCode = (new AttendanceCodeModel)->findOne([
            'classroomId' => $this->classroomId,
            'code' => $this->code
        ], 'ORDER BY expires_at DESC');



        if (!$classroomCode) {
            $this->addError('code', 'The code you inserted is incorrect or has expired');
            return false;
        }

        if (time() + 3600 > strtotime($classroomCode->expires_at)) {
            $this->addError('code', 'The code you inserted is incorrect or has expired');
            return false;
        }

        $this->codeId = $classroomCode->id;

        $userAttendance = (new UserAttendanceModel)->findOne([
            'userId' => $this->userId,
            'codeId' => $classroomCode->id,
            'classroomId' => $this->classroomId,
        ]);

        if ($userAttendance) {
            $this->addError('code', 'You already have an attendance for this class');
            return false;
        }

        // echo '<pre>';
        // var_dump(time() + 3600);
        // var_dump($classroomCode);
        // echo '</pre>';
        // exit;

        return parent::save();
    }

    public function rules(): array
    {
        return [
            'code' => [self::RULE_REQUIRED]
        ];
    }
}
