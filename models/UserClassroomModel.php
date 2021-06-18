<?php

namespace models;

use core\DatabaseModel;
use core\Model;

class UserClassroomModel extends DatabaseModel
{

    public string $id = '0';
    public string $userId = '';
    public string $classroomId = '';
    public string $type = '';

    public function primaryKey(): string
    {
        return 'id';
    }

    public function tableName(): string
    {
        return 'users_classrooms';
    }

    public function columnsToInput(): array
    {
        return ['userId', 'classroomId', 'type'];
    }

    public function inputs(): array
    {
        return ['userId', 'classroomId', 'type'];
    }

    public function save()
    {
        return parent::save();
    }

    public function rules(): array
    {
        return [];
    }

    public function isCreator()
    {
        return $this->type === 'creator';
    }

    public function isStudent()
    {
        return $this->type === 'student';
    }

    public function isMember()
    {
        return $this->isCreator() || $this->isStudent();
    }

    public function isPending()
    {
        return $this->type === 'pending';
    }
}
