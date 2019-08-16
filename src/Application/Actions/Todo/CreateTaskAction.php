<?php

namespace App\Application\Actions\Todo;

use App\Application\Actions\ActionPayload;
use Psr\Http\Message\ResponseInterface as Response;

class CreateTaskAction extends TodoAction
{
    protected function action(): Response
    {
        // TODO: Replace with Todos Model Methods
        $todo = [
            'message' => 'Task created'
        ];

        $this->logger->info('Task has been created');

        $payload = new ActionPayload(201, $todo);
        return $this->respond($payload)->withStatus(201);
    }
}
