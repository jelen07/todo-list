<?php

declare(strict_types=1);

namespace App\Entity;

use DateTimeInterface;

interface TaskInterface extends TimestampableInterface
{
    public function getId(): ?int;

    public function getDay(): ?DateTimeInterface;

    public function setDay(?DateTimeInterface $day): void;

    public function getTitle(): string;

    public function setTitle(string $title): void;

    public function isFinished(): bool;

    public function setFinished(bool $finished = true): void;

    public function getOwner(): ?UserInterface;

    public function setOwner(?UserInterface $owner): void;
}
