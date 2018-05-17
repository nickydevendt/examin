<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Form\FormTypeInterface;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users implements UserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prefix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $currentemployer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
    *   @ORM\Column(name="role", type="string", length=255)
    */
    private $role;

    public function __construct()
    {
	    $this->isActive = true;
	    $this->role = 'USER_ROLE';
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    public function setPrefix(string $prefix): self
    {
        $this->prefix = $prefix;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
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

    public function getCurrentemployer(): ?string
    {
        return $this->currentemployer;
    }

    public function setCurrentemployer(?string $currentemployer): self
    {
        $this->currentemployer = $currentemployer;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function setRole($role = null) {
        $this->role = $role;
    }

    public function getRole() {
        return $this->role;
    }

    public function getRoles() {
    	return array('ROLE_USER');
    }

    public function getSalt() {
        return null;
    }
    public function eraseCredentials() {
        return null;
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
        $this->id,
        $this->firstname,
        $this->prefix,
        $this->lastname,
        $this->email,
        $this->currentemployer,
        $this->username,
        $this->password,
        ));
    }

    public function unserialize($serialized)
    {
        list (
        $this->id,
        $this->firstname,
        $this->prefix,
        $this->lastname,
        $this->email,
        $this->currentemployer,
        $this->username,
        $this->password,
        ) = unserialize($serialized, ['allowed_classes' => false]);
    }
}

