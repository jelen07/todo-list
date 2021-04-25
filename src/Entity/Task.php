<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use App\Repository\TaskRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     collectionOperations={"get", "post"},
 *     itemOperations={"get", "put", "delete"},
 *     shortName="todo",
 *     normalizationContext={"groups"={"task:read"}},
 *     denormalizationContext={"groups"={"task:write"}}
 * )
 * @ApiFilter(BooleanFilter::class, properties={"finished"})
 * @ApiFilter(SearchFilter::class, properties={"title": "partial"})
 * @ApiFilter(PropertyFilter::class)
 * @ORM\Entity(repositoryClass=TaskRepository::class)
 */
class Task implements TaskInterface
{
    use TimestampableTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"task:read"})
     */
    private $id;

    /**
     * Specific day.
     *
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"task:read", "task:write"})
     */
    private $day;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"task:read", "task:write"})
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min=2,
     *     max=255,
     *     maxMessage="Describe task with 255 chars or less"
     * )
     */
    private $title;

    /**
     * Is the task already finished?
     *
     * @ORM\Column(type="boolean")
     * @Groups({"task:read", "task:write"})
     */
    private bool $finished = false;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="tasks")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"task:read", "task:write"})
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
