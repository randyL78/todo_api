<?php

/**
 * Provides an interface to interact with the todo database
 * @author Randy D. Layne <randydavidl78@gmail.com>
 */

declare(strict_types=1);

namespace App\Domain\Todos;

interface TaskRepositoryInterface
{
    /**
     * Find all tasks
     * @return array of Task objects
     */
    public function findAll(): array;

    /**
     * Find a specific task
     * @param integer $id
     * @return Task
     */
    public function findTaskOfId(int $id): Task;

    /**
     * Create a new task
     * @param Task $task
     * @param integer|null $status
     * @return boolean if successfully created
     */
    public function createTask(Task $task): bool;

    /**
     * Delete specified task
     * @param integer $id
     * @return boolean
     */
    public function deleteTask(int $id): bool;

    /**
     * Update details of a task
     * @param Task $task
     * @return boolean
     */
    public function updateTask(Task $task): bool;
}
