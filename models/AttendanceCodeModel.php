<?php

namespace models;

use core\DatabaseModel;
use core\Model;
use DateInterval;
use DateTime;
use DateTimeZone;

class AttendanceCodeModel extends DatabaseModel
{
    public string $id = '0';
    public string $code = '';
    public $expires_at;
    public string $classroomId = '';
    public string $duration = '';

    public function primaryKey(): string
    {
        return 'id';
    }

    public function tableName(): string
    {
        return 'attendance_codes';
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

    private function generateCode()
    {
        $length = 6;
        $keyspace = '123456789ABCDEFGHJKLNPQRSTUVWXYZ23456789';

        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces[] = $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }

    public function save()
    {
        $classroomCodes = (new AttendanceCodeModel)->findAll(['classroomId' => $this->classroomId]);
        foreach ($classroomCodes as $classroomCode) {
            if (time() + 3600 < strtotime($classroomCode->expires_at)) {
                $this->addError('code', 'There is already an active code');
                return false;
            }
        }

        // echo '<pre>';
        // var_dump($classroomCode);
        // echo '</pre>';
        // exit;

        $currentTime = date_create();
        $currentTime->setTimezone(new DateTimeZone('Europe/Bucharest'));
        $currentTime->add(new DateInterval('PT' . $this->duration . 'M'));
        $this->expires_at = $currentTime->format('Y-m-d H:i:s');

        $this->code = $this->generateCode();



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
