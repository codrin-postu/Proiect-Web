<?php

namespace core\exceptions;

use Exception;

class NotFoundException extends Exception
{
    protected $code = 404;
    protected $message = 'The page you are looking for can not be found :(';
}