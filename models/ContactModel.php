<?php

namespace models;

use core\Model;

class ContactModel extends Model
{
    public string $name = '';
    public string $email = '';
    public string $subject = '';
    public string $message = '';
    public function rules() : array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'subject' => [self::RULE_REQUIRED],
            'message' => [self::RULE_REQUIRED]
        ];
    }

    public function send()
    {
        return true;
    }
}