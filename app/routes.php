<?php

declare(strict_types=1);

use App\Application\Actions\Todo\DisplayEndpointsAction;
use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use App\Application\Actions\Todo\ListTodosAction;

return function (App $app) {
    $container = $app->getContainer();

    $app->group('/users', function (Group $group) use ($container) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });

    // display the possible endpoints
    $app->get('/', DisplayEndpointsAction::class);

    $app->group('/api/v1', function (Group $group) use ($container) {

        // route group for todos endpoints
        $group->group('/todos', function (Group $group) use ($container) {

            // get all todos
            $group->get('', ListTodosAction::class);
        });
    });
};
