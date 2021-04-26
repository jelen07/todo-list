<?php

declare(strict_types=1);

namespace App\Api\Task;

use Symfony\Component\Security\Core\User\UserInterface;

interface ClientInterface
{
    /**
     * @return mixed
     */
    public function getUserTasks(UserInterface $user);
}
