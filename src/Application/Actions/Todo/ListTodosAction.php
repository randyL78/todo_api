<?php

namespace App\Application\Actions\Todo;

use Psr\Http\Message\ResponseInterface as Response;

class ListTodosAction extends TodoAction
{
    protected function action(): Response
    {
        // TODO: replace with Todos Model methods
        $todos = [];
        $todos[] = [
            'id' => 1,
            'task' => 'Add database model classes',
            'status' => 2
        ];
        $todos[] = [
            'id' => 2,
            'task' => 'Create all of the routes',
            'status' => 4
        ];

        $this->logger->info('Todo list has been viewed');

        return $this->respondWithData($todos);
    }
}
