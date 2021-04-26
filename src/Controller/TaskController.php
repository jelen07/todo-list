<?php

declare(strict_types=1);

namespace App\Controller;

use App\Api\Task\ClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    private ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @Route("/", name="app_tasks")
     */
    public function __invoke(): Response
    {
        if ($this->getUser() === null) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('task/list.html.twig', [
            'tasks' => $this->client->getUserTasks($this->getUser()),
        ]);
    }
}
