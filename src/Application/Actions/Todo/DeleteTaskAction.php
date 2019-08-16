<?php

namespace App\Application\Actions\Todo;

use App\Application\Actions\ActionPayload;
use Psr\Http\Message\ResponseInterface as Response;

class DeleteTaskAction extends TodoAction
{
    protected function action(): Response
    {
        // TODO: Replace with Todos Model Methods
        $todo = [
            'message' => 'Task ' . $this->args['id'] . ' deleted'
        ];

        $this->logger->info('Task ' . $this->args['id'] . 'has been deleted');

        $payload = new ActionPayload(201, $todo);
        return $this->respond($payload)->withStatus(201);
    }
}
