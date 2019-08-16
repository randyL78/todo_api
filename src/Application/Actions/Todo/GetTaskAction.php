<?php

namespace App\Application\Actions\Todo;

use Psr\Http\Message\ResponseInterface as Response;

class GetTaskAction extends TodoAction
{
    protected function action(): Response
    {
        // TODO: replace with Todos Model methods
        $todos = [
            'id' => $this->args['id'],
            'task' => 'Add database model classes',
            'status' => 2
        ];

        $this->logger->info('Task ' . $this->args['id'] . ' has been viewed');

        return $this->respondWithData($todos);
    }
}
