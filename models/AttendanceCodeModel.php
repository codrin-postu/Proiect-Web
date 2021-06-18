<?php

namespace models;

use core\DatabaseModel;
use core\Model;
use DateTime;

class AttendanceCodeModel extends DatabaseModel
{
    public string $id = '0';
    public string $code = '';
    public string $expires_at = '';
    public string $classroomId = '';
    public string $duration = '';

    public function primaryKey(): string
    {
        return 'id';
    }

    public function tableName(): string
    {
        return 'attendace_codes';
    }

    public function columnsToInput(): array
    {
        return [
            'code',
            'expires_at',
            'classroomId'
        ];
    }

    public function inputs(): array
    {
        return [
            'code',
            'expires_at',
            'classroomId',
        ];
    }

    public function save()
    {


        $tableName = $this->tableName();
        $tableColumns = $this->columnsToInput();
        $inputs = $this->inputs();
        $params = array_map(fn ($input) => ":$input", $inputs);
        $stmt = self::prepare("INSERT INTO $tableName (" . implode(",", $tableColumns) . ") 
            VALUES(" . implode(",", $params) . ");");

        foreach ($inputs as $input) {
            // var_dump($this->$input, $this->{$input});
            $stmt->bindValue(":$input", $this->{$input});
        }

        $stmt->execute();
        return true;
    }



    public function rules(): array
    {
        return [];
    }
}
