<?php

namespace core;

class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/'; //If the URI is not present, it is assumed that the path is the default one
        $position = strpos($path, '?');

        if ($position === false) return $path;

        return substr($path, 0, $position);  //extracts path from start to '?' character in link
    }

    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet()
    {
        return $this->method() === 'get';
    }

    public function isPost()
    {
        return $this->method() === 'post';
    }

    public function isPut()
    {
        return $this->method() === 'put';
    }

    public function isDelete()
    {
        return $this->method() === 'delete';
    }

    public function getBody()
    {
        $body = [];
        $method = $this->method();
        if ($method === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        } else if ($method === 'post' || $method === 'put') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}
