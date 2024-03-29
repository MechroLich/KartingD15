<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $role;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Laptimes", mappedBy="user")
     */
    private $laptimes;

    public function __construct()
    {
        $this->laptimes = new ArrayCollection();
    }


    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    /**
     * @return mixed
     */

    public function __toString()
    {
        return (string) $this->getUsername();
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }


    public function getRoles(): array
    {
        return [$this->role];
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
            $laptime->setUser($this);
        }

        return $this;
    }

    public function removeLaptime(Laptimes $laptime): self
    {
        if ($this->laptimes->contains($laptime)) {
            $this->laptimes->removeElement($laptime);
            // set the owning side to null (unless already changed)
            if ($laptime->getUser() === $this) {
                $laptime->setUser(null);
            }
        }

        return $this;
    }

}
