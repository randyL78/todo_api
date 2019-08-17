<?php

namespace App\Application\Actions\Todo;

use App\Application\Actions\ActionPayload;
use App\Domain\Exceptions\TaskValidationException;
use App\Domain\Todos\Task;
use Psr\Http\Message\ResponseInterface as Response;

class UpdateTaskAction extends TodoAction
{
    protected function action(): Response
    {
        $this->logger->info('Task update record route viewed');

        $data = json_decode($this->request->getBody()->getContents(), true);

        if (
            !isset($this->args['id']) ||
            empty($data['task']) ||
            !isset($data['status'])
        ) {
            throw new TaskValidationException();
        }

        $task = $this->taskRepository->updateTask(
            new Task($this->args['id'], $data['task'], $data['status'])
        );

        $this->logger->info('Task ' . $this->args['id'] . ' has been updated');

        $payload = new ActionPayload(201, $task);
        return $this->respond($payload)->withStatus(201);
    }
}
