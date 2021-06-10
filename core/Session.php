<?php

namespace core;

class Session
{
    protected const FLASH_KEY = 'flash_messages';

    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessages as $key => &$value) 
        {
            $value['removed'] = true;
        }

        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }

    public function get($key)
    {
        return $_SESSION[$key] ?? false;
    }

    public function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public function setFlash(string $key, string $message)
    {
        $_SESSION[self::FLASH_KEY][$key] = [
            'removed' => false,
            'value' => $message
        ];
        
    }

    public function getFlash(string $key)
    {
        return $_SESSION[self::FLASH_KEY][$key]['value'] ?? false;
    }

    public function __destruct()
    {
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessages as $key => &$value) 
        {
            if($value['removed'])
            {
                unset($flashMessages[$key]);
            }
        }

        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }
}