<?php

namespace App\Application\Actions\Todo;

use Psr\Http\Message\ResponseInterface as Response;

class ListTasksAction extends TodoAction
{
    protected function action(): Response
    {
        $todos = $this->taskRepository->findAll();

        return $this->respondWithData($todos);
    }
}
