<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="string", length=255)
     */
    private $finished;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="laptimes")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Races", inversedBy="laptimes")
     */
    private $races;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFinished(): ?string
    {
        return $this->finished;
    }

    public function setFinished(string $finished): self
    {
        $this->finished = $finished;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getRaces(): ?Races
    {
        return $this->races;
    }

    public function setRaces(?Races $races): self
    {
        $this->races = $races;

        return $this;
    }

}
