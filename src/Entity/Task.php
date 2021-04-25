<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TaskRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * @ORM\Entity(repositoryClass=TaskRepository::class)
 */
class Task implements TaskInterface
{
    use TimestampableTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Specific day.
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $day;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * Is the task already finished?
     *
     * @ORM\Column(type="boolean")
     */
    private bool $finished = false;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="tasks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;


    /**
     * @throws Exception
     */
    public function __construct(string $title)
    {
        $this->title = $title;
        $this->setTimestampable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?DateTimeInterface
    {
        return $this->day;
    }

    public function setDay(?DateTimeInterface $day): void
    {
        $this->day = $day;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function isFinished(): bool
    {
        return $this->finished;
    }

    public function setFinished(bool $finished = true): void
    {
        $this->finished = $finished;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): void
    {
        $this->owner = $owner;
    }
}
