<?php

namespace App\Application\Actions\Todo;

use App\Application\Actions\Action;
// TODO sub in the following with the DB Model
// use App\Domain\User\UserRepository;
use Psr\Log\LoggerInterface;

abstract class TodoAction extends Action
{
    /**
     * @var \PDO
     */
    protected $todoData;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);
    }
}
