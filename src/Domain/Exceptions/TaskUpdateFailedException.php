<?php

declare(strict_types=1);

namespace App\Domain\Exceptions;

class TaskUpdateFailedException extends DomainValidationFailedException
{
    public $message = 'Unable to update task.';
}
