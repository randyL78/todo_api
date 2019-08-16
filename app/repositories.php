<?php

declare(strict_types=1);

use App\Domain\Todos\TaskRepositoryInterface;
use App\Domain\User\UserRepository;
use App\Infrastructure\Persistence\Tasks\TaskRepository;
use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        UserRepository::class => \DI\autowire(InMemoryUserRepository::class),

        TaskRepositoryInterface::class => DI\factory(
            function (ContainerInterface $c) {
                // get the database settings
                $db = $c->get('settings')['db'];

                // create a database connection PDO object
                $pdo = new PDO($db['dsn'] . ':' . $db['database']);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

                return new TaskRepository($pdo);
            }
        )

    ]);
};
