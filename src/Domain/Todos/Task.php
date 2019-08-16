<?php

/**
 * Creates a Task Object representing one row of data
 * from the tasks table
 * @author Randy D. Layne <randydavidl78@gmail.com>
 */

declare(strict_types=1);

namespace App\Domain\Todos;

use JsonSerializable;

class Task implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $text;

    /**
     * @var int|null
     */
    private $status;

    /**
     * @param integer|null $id
     * @param string $text
     * @param integer|null $status
     */
    public function __construct(?int $id, string $text, ?int $status)
    {
        $this->id = $id;
        $this->text = $text;
        $this->status = $status;
    }

    /**
     * @return integer|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return integer|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'text' => $this->text,
            'status' => $this->status
        ];
    }
}
