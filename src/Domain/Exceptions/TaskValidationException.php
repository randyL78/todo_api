<?php

declare(strict_types=1);

namespace App\Domain\Exceptions;

class TaskValidationException extends DomainValidationFailedException
{
    public $message = 'Required Task Data Missing.';
}
