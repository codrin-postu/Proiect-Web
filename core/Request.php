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

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}
