<?php

namespace App\Application\Actions\Todo;

use App\Application\Actions\ActionPayload;
use Psr\Http\Message\ResponseInterface as Response;

class DeleteTaskAction extends TodoAction
{
    protected function action(): Response
    {
        $this->logger->info('Task delete route has been viewed');

        $todo = $this->taskRepository->deleteTask($this->args['id']);

        $this->logger->info('Task ' . $this->args['id'] . ' has been deleted');

        $payload = new ActionPayload(200, $todo);
        return $this->respond($payload)->withStatus(200);
    }
}
