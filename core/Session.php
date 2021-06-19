<?php

namespace core;

class Session
{

    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $flashMessages = $_SESSION['flash_messages'] ?? [];
        foreach ($flashMessages as $key => &$value) {
            $value['removed'] = true;
        }

        $_SESSION['flash_messages'] = $flashMessages;
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
        $_SESSION['flash_messages'][$key] = [
            'removed' => false,
            'value' => $message
        ];
    }

    public function getFlash(string $key)
    {
        return $_SESSION['flash_messages'][$key]['value'] ?? false;
    }

    public function __destruct()
    {
        $flashMessages = $_SESSION['flash_messages'] ?? [];
        foreach ($flashMessages as $key => &$value) {
            if ($value['removed']) {
                unset($flashMessages[$key]);
            }
        }

        $_SESSION['flash_messages'] = $flashMessages;
    }
}
