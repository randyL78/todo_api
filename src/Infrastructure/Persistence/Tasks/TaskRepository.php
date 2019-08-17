<?php

/**
 * Performs all of the interactions with the todo database
 * @author Randy D. Layne <randydavidl78@gmail.com>
 */

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Tasks;

use App\Domain\Exceptions\TaskCreateFailedException;
use App\Domain\Exceptions\TaskDeleteFailedException;
use PDO;


use App\Domain\Todos\Task;
use App\Domain\Todos\TaskRepositoryInterface;
use App\Domain\Exceptions\TaskNotFoundException;
use App\Domain\Exceptions\TaskUpdateFailedException;
use App\Domain\Exceptions\TaskValidationException;

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

        if (empty($tasksList)) {
            throw new TaskNotFoundException();
        }

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
            throw new TaskValidationException();
        }

        $statement = $this->database->prepare(
            'SELECT * FROM tasks WHERE id=:id'
        );

        $statement->bindParam('id', $id, PDO::PARAM_INT);
        $statement->execute();
        $task = $statement->fetch();

        if (empty($task)) {
            throw new TaskNotFoundException();
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
    public function createTask(Task $task): Task
    {
        $statement = $this->database->prepare(
            'INSERT INTO tasks (task, status) VALUES (:task, :status)'
        );

        $text = $task->getTask();
        $status = $task->getStatus();

        $statement->bindParam('task', $text, PDO::PARAM_STR);
        $statement->bindParam('status', $status, PDO::PARAM_INT);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            return $this->findTaskOfId((int) $this->database->lastInsertId());
        } else {
            throw new TaskCreateFailedException();
        }
    }

    /**
     * @inheritDoc
     */
    public function deleteTask(int $id): array
    {

        if (empty($id)) {
            throw TaskValidationException();
        }

        $statement = $this->database->prepare(
            'DELETE FROM tasks WHERE id=:id'
        );

        $statement->bindParam('id', $id, PDO::PARAM_INT);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            return ['message' => 'Task ' . $id . ' was deleted.'];
        } else {
            throw new TaskDeleteFailedException();
        }
    }

    /**
     * @inheritDoc
     */
    public function updateTask(Task $task): Task
    {
        $statement = $this->database->prepare(
            'UPDATE tasks SET task=:task, status=:status WHERE id=:id'
        );

        $id = $task->getId();
        $text = $task->getTask();
        $status = $task->getStatus();

        $statement->bindParam('id', $id, PDO::PARAM_INT);
        $statement->bindParam('task', $text, PDO::PARAM_STR);
        $statement->bindParam('status', $status, PDO::PARAM_INT);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            return $this->findTaskOfId($id);
        } else {
            throw new TaskUpdateFailedException();
        }
    }
}
