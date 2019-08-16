<?php

namespace App\Application\Actions\Todo;

use Psr\Http\Message\ResponseInterface as Response;

class TaskAction extends TodoAction
{
    protected function action(): Response
    {
        $task = $this->taskRepository->findTaskOfId($this->args['id']);

        return $this->respondWithData($task);
    }
}
