<?php

namespace models;

use core\DatabaseModel;

class UserClassroomModel extends DatabaseModel
{

    public string $id = '0';
    public string $userId = '';
    public string $classroomId = '';
    public string $userType = '';

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
        return ['userId', 'classroomId', 'userType'];
    }

    public function inputs(): array
    {
        return ['userId', 'classroomId', 'userType'];
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
        return $this->userType === 'creator';
    }

    public function isStudent()
    {
        return $this->userType === 'student';
    }

    public function isMember()
    {
        return $this->isCreator() || $this->isStudent();
    }

    public function isPending()
    {
        return $this->userType === 'pending';
    }

    public function setStudent()
    {

        $tableName = $this->tableName();

        $stmt = self::prepare("UPDATE $tableName
            SET userType = '$this->userType'
            WHERE id = $this->id;");

        $stmt->execute();
        return true;
    }

    public function delete()
    {
        $tableName = $this->tableName();
        $stmt = self::prepare("DELETE FROM $tableName WHERE id = $this->id;");

        $stmt->execute();
        return true;
    }
}
