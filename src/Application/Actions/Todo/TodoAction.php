<?php

namespace App\Application\Actions\Todo;

use App\Application\Actions\Action;
use App\Domain\Todos\TaskRepositoryInterface;
use Psr\Log\LoggerInterface;

abstract class TodoAction extends Action
{
    /**
     * @var TaskRepositoryInterface
     */
    protected $taskRepository;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger, TaskRepositoryInterface $taskRepository)
    {
        parent::__construct($logger);
        $this->taskRepository = $taskRepository;
    }
}
