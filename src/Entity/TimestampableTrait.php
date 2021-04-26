<?php

declare(strict_types=1);

namespace App\Entity;

use App\Exception\InvalidStateException;
use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Symfony\Component\Serializer\Annotation\Groups;

trait TimestampableTrait
{
    /**
     * @ORM\Column(type="datetime")
     * @Groups({"task:read"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"task:read"})
     */
    private $updatedAt;

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @param DateTimeInterface|null $dateTime
     * @throws Exception
     */
    private function setTimestampable(?DateTimeInterface $dateTime = NULL): void
    {
        if (NULL !== $this->createdAt || NULL !== $this->updatedAt) {
            throw new InvalidStateException(sprintf(
                'Column %s::$createdAt or %s::$updatedAt have already value.',
                static::class,
                static::class,
            ));
        }

        $dateTime ??= new DateTimeImmutable('now', new DateTimeZone('UTC'));
        $this->createdAt = $dateTime;
        $this->updatedAt = $dateTime;
    }
}
