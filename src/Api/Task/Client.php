<?php

declare(strict_types=1);

namespace App\Api\Task;

use DateTimeImmutable;
use Exception;
use GuzzleHttp\ClientInterface as GuzzleClientInterface;
use GuzzleHttp\Psr7\Request;
use Nette\Utils\Json;
use Symfony\Component\Security\Core\User\UserInterface;

final class Client implements ClientInterface
{
    private GuzzleClientInterface $client;

    public function __construct(GuzzleClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function getUserTasks(UserInterface $user)
    {
        try {
            $request = new Request('GET', 'api/todos', [
                'accept' => 'application/json'
            ]);
            $response = $this->client->send($request);

            return Json::decode($response->getBody()->getContents());
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function createTask(string $title, DateTimeImmutable $date)
    {
        throw new Exception(sprintf('%s::%s not implemented', __CLASS__, __METHOD__));
    }

    public function finishTask(int $id)
    {
        throw new Exception(sprintf('%s::%s not implemented', __CLASS__, __METHOD__));
    }

    public function deleteTask(int $id)
    {
        throw new Exception(sprintf('%s::%s not implemented', __CLASS__, __METHOD__));
    }
}
