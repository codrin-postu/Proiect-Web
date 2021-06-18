<?php

namespace middlewares;

use core\Middleware;
use core\Application;
use core\exceptions\ForbiddenException;
use models\UserClassroomModel;

class CreatorClassroomMiddleware extends Middleware
{
    public array $actions = [];

    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        $userId = Application::$application->session->get('user');
        $path = Application::$application->request->getPath();
        preg_match('/\d{6,}/', $path, $matches);
        $classroomId = $matches[0] ?? null;

        $userClassroom = (new UserClassroomModel())->findOne(['userId' => $userId, 'classroomId' => $classroomId]);

        if (!$userClassroom || !$userClassroom->isCreator()) {
            if (empty($this->actions) || in_array(Application::$application->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}
