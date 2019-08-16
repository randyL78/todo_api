<?php

/**
 * Performs all of the interactions with the todo database
 * @author Randy D. Layne <randydavidl78@gmail.com>
 */

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Tasks;

use PDO;


use App\Domain\Todos\Task;
use App\Domain\Todos\TaskRepositoryInterface;
use Exception;

class TaskRepository implements TaskRepositoryInterface
{

    /**
     * @var PDO the PDO Object for the database connection
     */
    protected $database;

    /**
     * @param PDO $database
     */
    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    /**
     * @inheritDoc
     */
    public function findAll(): array
    {
        $statement = $this->database->prepare(
            'SELECT * FROM tasks ORDER BY id'
        );

        $statement->execute();
        $tasksList = $statement->fetchAll();
        $tasks = [];

        // TODO throw a not found exception

        // convert assoc array of task data and convert 
        // to array of Task objects
        foreach ($tasksList as $task) {
            $tasks[] = new Task(
                (int) $task['id'],
                $task['task'],
                (int) $task['status']
            );
        }

        return $tasks;
    }

    /**
     * @inheritDoc
     */
    public function findTaskOfId(int $id): Task
    {
        if (empty($id)) {
            // TODO throw info required exception
        }

        $statement = $this->database->prepare(
            'SELECT * FROM tasks WHERE id=:id'
        );

        $statement->bindParam('id', $id, PDO::PARAM_INT);
        $statement->execute();
        $task = $statement->fetch();

        if (empty($task)) {
            // TODO throw task not found exception
            throw new Exception('Task not found');
        }

        return new Task(
            (int) $task['id'],
            $task['task'],
            (int) $task['status']
        );
    }

    /**
     * Create a new task
     * @inheritDoc
     */
    public function createTask(Task $task): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteTask(int $id): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function updateTask(Task $task): bool
    {
        return true;
    }
}
