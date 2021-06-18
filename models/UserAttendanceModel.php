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
        return ['userId', 'classroomId', 'code'];
    }

    public function inputs(): array
    {
        return ['userId', 'classroomId', 'code'];
    }

    public function save()
    {
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'code' => [self::RULE_REQUIRED]
        ];
    }
}
