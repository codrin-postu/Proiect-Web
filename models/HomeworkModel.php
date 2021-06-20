<?php

namespace models;

use core\DatabaseModel;
use core\Model;
use DateInterval;
use DateTime;
use DateTimeZone;

class HomeworkModel extends DatabaseModel
{
    public string $id = '0';
    public $start_date = '';
    public $end_date = '';
    public string $classroomId = '';
    public string $title = '';
    public string $status = 0;
    public string $description = '';

    public function primaryKey(): string
    {
        return 'id';
    }

    public function tableName(): string
    {
        return 'homeworks';
    }

    public function columnsToInput(): array
    {
        return [
            'title',
            'description',
            'classroomId',
            'start_date',
            'end_date'
        ];
    }

    public function inputs(): array
    {
        return [
            'title',
            'description',
            'classroomId',
            'start_date',
            'end_date'
        ];
    }

    public function rules(): array
    {
        return [
            'title' => [self::RULE_REQUIRED],
            'description' => [self::RULE_REQUIRED],
            'end_date' => [self::RULE_REQUIRED]
        ];
    }

    public function delete()
    {
        $tableName = $this->tableName();
        $stmt = self::prepare("DELETE FROM $tableName WHERE id = :id;");

        $stmt->bindValue(":id", $this->id);

        $stmt->execute();
        return true;
    }

    public function save()
    {
        $this->start_date = date('Y-m-d H:i:s', time());

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
}
