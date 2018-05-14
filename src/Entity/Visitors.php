<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VisitorsRepository")
 */
class Visitors
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="randomid", type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $randomid;

    /**
     * @ORM\Column(type="integer")
     */
    private $inviteid;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prefix;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datecreated;

    /**
     * @ORM\Column(type="datetime")
     */
    private $expiredate;

    public function getId()
    {
        return $this->id;
    }

    public function getRandomid(): ?string
    {
        return $this->randomid;
    }

    public function setRandomid(): self
    {
        $uuid = \Ramsey\Uuid\Uuid::uuid4();
        $this->randomid = $uuid->toString();

        return $this;
    }

    public function getInviteid(): ?int
    {
        return $this->inviteid;
    }

    public function setInviteid(int $inviteid): self
    {
        $this->inviteid = $inviteid;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    public function setPrefix(?string $prefix): self
    {
        $this->prefix = $prefix;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDatecreated(): ?\DateTimeInterface
    {
        return $this->datecreated;
    }

    public function setDatecreated(): self
    {
        $this->datecreated = new \DateTime("now");

        return $this;
    }

    public function getExpiredate(): ?\DateTimeInterface
    {
        return $this->expiredate;
    }

    public function setExpiredate(): self
    {
        $this->expiredate = new \DateTime("now");

        return $this;
    }
}
