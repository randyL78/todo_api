<?php

declare(strict_types=1);

use App\Application\Middleware\TrailingDashMiddleware;
use Slim\App;

return function (App $app) {
    $app->add(TrailingDashMiddleware::class);
};
