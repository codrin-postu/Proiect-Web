<?php

namespace core;

class Response
{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    public function redirect(string $address)
    {
        return header(sprintf('Location: %s', $address));
    }
}
