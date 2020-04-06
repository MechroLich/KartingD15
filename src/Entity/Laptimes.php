<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LaptimesRepository")
 */
class Laptimes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_id;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $lap1;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $lap2;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $lap3;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $total;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Races")
     * @ORM\JoinColumn(nullable=false)
     */
    private $race_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $finished;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getLap1(): ?\DateTimeInterface
    {
        return $this->lap1;
    }

    public function setLap1(?\DateTimeInterface $lap1): self
    {
        $this->lap1 = $lap1;

        return $this;
    }

    public function getLap2(): ?\DateTimeInterface
    {
        return $this->lap2;
    }

    public function setLap2(?\DateTimeInterface $lap2): self
    {
        $this->lap2 = $lap2;

        return $this;
    }

    public function getLap3(): ?\DateTimeInterface
    {
        return $this->lap3;
    }

    public function setLap3(?\DateTimeInterface $lap3): self
    {
        $this->lap3 = $lap3;

        return $this;
    }

    public function getTotal(): ?\DateTimeInterface
    {
        return $this->total;
    }

    public function setTotal(?\DateTimeInterface $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getRaceId(): ?Races
    {
        return $this->race_id;
    }

    public function setRaceId(?Races $race_id): self
    {
        $this->race_id = $race_id;

        return $this;
    }

    public function getFinished(): ?string
    {
        return $this->finished;
    }

    public function setFinished(string $finished): self
    {
        $this->finished = $finished;

        return $this;
    }
}
