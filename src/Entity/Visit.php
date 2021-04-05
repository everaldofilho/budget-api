<?php

namespace App\Entity;

use App\Repository\VisitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VisitRepository::class)
 */
class Visit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $objective;

    /**
     * @ORM\Column(type="text")
     */
    private $done;

    /**
     * @ORM\Column(type="datetime")
     */
    private $initiated;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $finished;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=Address::class)
     */
    private $address;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObjective(): ?string
    {
        return $this->objective;
    }

    public function setObjective(string $objective): self
    {
        $this->objective = $objective;

        return $this;
    }

    public function getDone(): ?string
    {
        return $this->done;
    }

    public function setDone(string $done): self
    {
        $this->done = $done;

        return $this;
    }

    public function getInitiated(): ?\DateTimeInterface
    {
        return $this->initiated;
    }

    public function setInitiated(\DateTimeInterface $initiated): self
    {
        $this->initiated = $initiated;

        return $this;
    }

    public function getFinished(): ?\DateTimeInterface
    {
        return $this->finished;
    }

    public function setFinished(?\DateTimeInterface $finished): self
    {
        $this->finished = $finished;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }
}
