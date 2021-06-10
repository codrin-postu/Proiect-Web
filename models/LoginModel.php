<?php

namespace models;

use core\Application;
use core\Model;

class LoginModel extends Model
{
        public string $email = '';
        public string $password = '';
        public function rules() : array
        {
            return [
                'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
                'password' => [self::RULE_REQUIRED]
            ];
        }

        public function finalize()
        {
            $userInstance = new UserModel();
            $user = $userInstance->findOne(['email' => $this->email]);
            if (!$user) 
            {
                $this->addError('email', 'Email address does not exist or is incorrect');
                return false;
            }

            if (!password_verify($this->password, $user->password)) {
                $this->addError('password', 'Password is incorrect');
                return false;
            }

            // echo "<pre>";
            // var_dump($user);
            // echo "</pre>";
            // exit;
            return Application::$application->login($user);
        }
}