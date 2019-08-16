<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Logger;

return function (ContainerBuilder $containerBuilder) {
    // Global Settings Object
    $containerBuilder->addDefinitions([
        'settings' => [
            // Should be set to false in production
            'displayErrorDetails' => true,
            'logger' => [
                'name' => 'slim-app',
                'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
                'level' => Logger::DEBUG,
            ],

            // API route and version info
            'api' => [
                'version' => 'v1',
                'base_url' => 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT']
            ],

            // Sqlite database settings
            'db' => [
                'dsn' => 'sqlite',
                'database' => __DIR__ . '/../src/Infrastructure/todo.db'
            ]


        ],
    ]);
};
