<?php

namespace models;

use core\Model;

class RegisterModel extends Model
{
    public string $firstName = '';
    public string $lastName = '';
    public string $middleName = '';
    public string $email = '';
    public string $password = '';
    public string $confirmPassword = '';
    public string $accountType = ''; //"student" "academic" <- professor

    public function register()
    {
        echo "User creating!";
    }

    public function rules() : array
    {
        return [
            'firstName' => [self::RULE_REQUIRED],
            'lastName' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 64]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'matchAttribute' => 'password']]
        ];
    }
}