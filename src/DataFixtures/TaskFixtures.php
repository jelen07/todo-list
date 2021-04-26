<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Task;
use App\Entity\UserInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Exception;

class TaskFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        $titles = [
            'My first task',
            'My second task',
            'My third task',
            'Just an other task',
            'Don not forgot to...',
            'What should I have to do?',
        ];

        /** @var UserInterface $user */
        $user = $this->getReference(UserFixtures::USER);

        foreach ($titles as $title) {
            $task = new Task($title);
            $task->setOwner($user);
            $manager->persist($task);
        }

        $manager->flush();
    }

    /**
     * @return array|string[]
     */
    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
        ];
    }
}
