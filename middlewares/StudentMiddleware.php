<?php

namespace middlewares;

use core\Middleware;
use core\Application;
use core\exceptions\ForbiddenException;

class StudentMiddleware extends Middleware
{
    public array $actions = [];

    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if (!Application::$application->user->isStudent()) {
            if (empty($this->actions) || in_array(Application::$application->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}
