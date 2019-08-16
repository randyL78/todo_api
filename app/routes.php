<?php

declare(strict_types=1);


use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

// Actions for todos
use App\Application\Actions\Todo\CreateTaskAction;
use App\Application\Actions\Todo\DeleteTaskAction;
use App\Application\Actions\Todo\GetTaskAction;
use App\Application\Actions\Todo\ListTodosAction;
use App\Application\Actions\Todo\UpdateTaskAction;
use App\Application\Actions\Todo\DisplayEndpointsAction;


return function (App $app) {
    $container = $app->getContainer();

    // display the possible endpoints
    $app->get('/', DisplayEndpointsAction::class);

    // route group for todos endpoints
    $app->group('/api/v1/todos', function (Group $group) use ($container) {

        // get all task
        $group->get('', ListTodosAction::class);

        // create a task
        $group->post('', CreateTaskAction::class);

        // get a specific task
        $group->get('/{id}', GetTaskAction::class);

        // update a task
        $group->put('/{id}', UpdateTaskAction::class);

        // delete a task
        $group->delete('/{id}', DeleteTaskAction::class);
    });
};
