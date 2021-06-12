<?php

namespace core\exceptions;

use Exception;

class ForbiddenException extends Exception
{
    protected $code = 403;
    protected $message = 'You do not have permission to acces this webpage';
}