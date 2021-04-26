<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\Collection;

interface UserInterface
{
    public function getId(): ?int;

    public function getEmail(): ?string;

    public function setEmail(string $email): void;

    public function setRoles(array $roles): void;

    public function setPassword(string $password): void;

    public function getTasks(): Collection;

    public function addTask(Task $task): void;

    public function removeTask(Task $task): void;

    public function getName(): string;
}
