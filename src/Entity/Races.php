<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RacesRepository")
 */
class Races
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $track;

    /**
     * @ORM\Column(type="time")
     */
    private $time;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Laptimes", mappedBy="races")
     */
    private $laptimes;


    public function __toString()
    {
        $temp1 = (string) $this->getTrack()."-";
        $temp2 = $this->getDate()->format('d-m-Y')."-";
        $temp3 = $this->getTime()->format('H:i:s');
        $comb = $temp1.$temp2.$temp3;
        return $comb;
    }

    public function __construct()
    {
        $this->laptimes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTrack(): ?string
    {
        return $this->track;
    }

    public function setTrack(string $track): self
    {
        $this->track = $track;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return Collection|Laptimes[]
     */
    public function getLaptimes(): Collection
    {
        return $this->laptimes;
    }

    public function addLaptime(Laptimes $laptime): self
    {
        if (!$this->laptimes->contains($laptime)) {
            $this->laptimes[] = $laptime;
            $laptime->setRaces($this);
        }

        return $this;
    }

    public function removeLaptime(Laptimes $laptime): self
    {
        if ($this->laptimes->contains($laptime)) {
            $this->laptimes->removeElement($laptime);
            // set the owning side to null (unless already changed)
            if ($laptime->getRaces() === $this) {
                $laptime->setRaces(null);
            }
        }

        return $this;
    }


}
