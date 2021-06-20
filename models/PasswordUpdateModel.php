<?php

namespace models;

use core\DatabaseModel;

class PasswordUpdateModel extends DatabaseModel
{
    public string $id = '0';
    public string $oldPassword = '';
    public string $newPassword = '';
    public string $confirmPassword = '';

    public function primaryKey(): string
    {
        return 'id';
    }

    public function tableName(): string
    {
        return 'users';
    }

    public function clause(): array
    {
        return ['id' => $this->id];
    }

    public function columnsToInput(): array
    {
        return ['password'];
    }

    public function inputs(): array
    {
        return ['newPassword'];
    }

    public function update()
    {
        $userInstance = new UserModel();
        $user = $userInstance->findOne(['id' => $this->id]);

        echo 'reaches this';

        echo '<pre>';
        var_dump(password_verify($this->oldPassword, $user->password));
        echo '</pre>';
        // exit;

        if (!password_verify($this->oldPassword, $user->password)) {
            $this->addError('oldPassword', 'Password is incorrect');
            return false;
        }


        $this->newPassword = password_hash($this->newPassword, PASSWORD_BCRYPT);

        return parent::update();
    }

    public function rules(): array
    {
        return [
            'oldPassword' => [self::RULE_REQUIRED, self::RULE_PASS],
            'newPassword' => [self::RULE_REQUIRED, self::RULE_PASS, [self::RULE_DIFFERENT, 'matchAttribute' => 'oldPassword']],
            'confirmPassword' => [self::RULE_REQUIRED, self::RULE_PASS, [self::RULE_MATCH, 'matchAttribute' => 'newPassword']]
        ];
    }


    /**
     * Must use the database column names NOT the variables that have been set up above, 
     * if they are different.
     */
}
