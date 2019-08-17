<?php

declare(strict_types=1);

use App\Domain\Todos\TaskRepositoryInterface;
use App\Infrastructure\Persistence\Tasks\TaskRepository;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;

return function (ContainerBuilder $containerBuilder) {

    $containerBuilder->addDefinitions([
        TaskRepositoryInterface::class => DI\factory(
            function (ContainerInterface $c) {
                // get the database settings
                $db = $c->get('settings')['db'];

                // create a database connection PDO object
                $pdo = new PDO($db['dsn'] . ':' . $db['database']);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(
                    PDO::ATTR_DEFAULT_FETCH_MODE,
                    PDO::FETCH_ASSOC
                );

                return new TaskRepository($pdo);
            }
        )
    ]);
};
