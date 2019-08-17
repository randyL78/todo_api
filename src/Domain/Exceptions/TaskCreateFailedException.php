<?php

declare(strict_types=1);

namespace App\Domain\Exceptions;

class TaskCreateFailedException extends DomainValidationFailedException
{
    public $message = 'Unable to create task.';
}
