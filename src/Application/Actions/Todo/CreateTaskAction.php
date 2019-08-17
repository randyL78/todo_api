<?php

namespace App\Application\Actions\Todo;

use App\Application\Actions\ActionPayload;
use App\Domain\Exceptions\TaskValidationException;
use App\Domain\Todos\Task;
use Psr\Http\Message\ResponseInterface as Response;

class CreateTaskAction extends TodoAction
{
    protected function action(): Response
    {
        $this->logger->info('Task create route viewed');

        $data = $this->request->getParsedBody();

        if (empty($data['task']) || !isset($data['status'])) {
            throw new TaskValidationException();
        }

        $task = $this->taskRepository->createTask(
            new Task(null, $data['task'], $data['status'])
        );

        $this->logger->info('Task has been created');

        $payload = new ActionPayload(201, $task);
        return $this->respond($payload)->withStatus(201);
    }
}
