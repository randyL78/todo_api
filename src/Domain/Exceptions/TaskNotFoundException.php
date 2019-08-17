<?php

declare(strict_types=1);

namespace App\Domain\Exceptions;

class TaskNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The task you requested does not exist.';
}
