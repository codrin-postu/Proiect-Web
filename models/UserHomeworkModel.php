<?php

namespace models;

use core\DatabaseModel;

class UserHomeworkModel extends DatabaseModel
{

    public string $id = '0';
    public string $userId = '';
    public string $homeworkId = '';
    public string $gradeId = '';
    public string $status = '';
    public string $uploaded_file = '';
    public string $uploaded_at = '';

    public function primaryKey(): string
    {
        return 'id';
    }

    public function tableName(): string
    {
        return 'users_homeworks';
    }

    public function columnsToInput(): array
    {
        return ['userId', 'homeworkId', 'uploaded_file', 'status'];
    }

    public function inputs(): array
    {
        return ['userId', 'homeworkId', 'uploaded_file', 'status'];
    }

    public function save()
    {



        $userHomework = (new UserHomeworkModel)->findOne([
            'userId' => $this->userId,
            // 'homeworkId' => $homework->id,
            'homeworkId' => $this->homeworkId,
        ]);

        if ($userHomework) {
            $this->addError('code', 'You already uploaded a file for this homework');
            return false;
        }

        // echo '<pre>';
        // var_dump(time() + 3600);
        // var_dump($classroomCode);
        // echo '</pre>';
        // exit;

        return parent::save();
    }

    public function updateColumn()
    {
        $tableName = $this->tableName();

        $stmt = self::prepare("UPDATE $tableName 
            SET status = $this->status,
            gradeId = $this->gradeId
            WHERE id = $this->id;");

        $stmt->execute();
        return true;
    }

    public function delete()
    {
        $tableName = $this->tableName();
        $stmt = self::prepare("DELETE FROM $tableName WHERE id = '$this->id';");

        $stmt->execute();
        return true;
    }

    public function rules(): array
    {
        return [];
    }
}
