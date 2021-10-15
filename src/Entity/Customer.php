<?php

/*
 * This file is part of donbrico/sp-agri-pro.
 *
 * Copyright (c) 2021 - Brice POTE <brice.pote@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

class Customer implements UserInterface, UserAppInterface, UserDataCustomerInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $firstName;
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstsName(?string $firstName = null): self
    {
        $this->firstName = $firstName;
        return $this;
    }


    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private string $lastName;
    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName = null): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    private ?string $adresse;
    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $_adresse = null): self
    {
        $this->adresse = $_adresse;
        return $this;
    }

    /**
     * @ORM\Column(type="json")
     */
    private array $roles = [];
    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = ['ROLE_USER'];
        return array_unique($roles);
    }

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $password;
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $salt;
    public function getSalt(): string
    {
        return $this->salt;
    }


    /**
     * @see UserInterface
     */
    private string $plainTextPassword;
    public function getPlainTextPassword(): string
    {
        return $this->plainTextPassword;
    }

    public function setPlainTextPassword(string $plainTextPassword): self
    {
        $this->plainTextPassword = $plainTextPassword;
        return $this;
    }


    /**
     * @see UserInterface
     */
    public function eraseCredentials(): bool
    {
        $this->plainTextPassword = '';
        return true;
    }


    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $username;
    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUserName(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function __call(string $name, array $arguments)
    {
        // TODO: Implement @method string getUserIdentifier()
    }

    public function __construct()
    {
        $this->id = 0;
        $this->password = '';
        $this->salt = '';
        $this->plainTextPassword = '';
        $this->username = '';
    }
}
