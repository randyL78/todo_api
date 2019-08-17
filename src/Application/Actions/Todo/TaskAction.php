<?php

namespace App\Application\Actions\Todo;

use Psr\Http\Message\ResponseInterface as Response;

class TaskAction extends TodoAction
{
    protected function action(): Response
    {
        $this->logger->info('Find specific task route has been viewed');

        $task = $this->taskRepository->findTaskOfId($this->args['id']);

        $this->logger->info('Task ' . $this->args['id'] . ' found');

        return $this->respondWithData($task);
    }
}
