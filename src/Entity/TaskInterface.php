<?php

declare(strict_types=1);


namespace App\Entity;


use DateTimeInterface;

interface TaskInterface extends TimestampableInterface
{
    public function getTitle(): string;

    public function setTitle(string $title): void;

    public function getDay();

    public function setDay(?DateTimeInterface $day): void;

    public function isFinished(): bool;

    public function setFinished(bool $finished = true): void;
}
