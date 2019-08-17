<?php

declare(strict_types=1);

namespace App\Domain\Exceptions;

class TaskDeleteFailedException extends DomainValidationFailedException
{
    public $message = 'Unable to delete selected task.';
}
