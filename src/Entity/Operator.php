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
use JetBrains\PhpStorm\Pure;

/**
 * Operator
 *
 * @ORM\Entity(repositoryClass="App\Repository\OperatorRepository")
 * @method string getUserIdentifier()
 */
final class Operator implements UserInterface, UserAppInterface
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

    //========================================================================================================
    // UserAppInterface
    //========================================================================================================
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $firstName;
    public function getFirstName(): ?string
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

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName ?? null;
        return $this;
    }


    //========================================================================================================
    // UserDataOperator
    //========================================================================================================
    private UserDataOperator $dataOperator;
    public function setData(?string $comments): self
    {
        $this->dataOperator->setComment($comments ?? null);
        return $this;
    }
    public function getData(): ?string
    {
        return $this->dataOperator->getComments();
    }


    //========================================================================================================
    // UserInterface
    //========================================================================================================
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
    private ?string $password;
    public function getPassword(): ?string
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
    private ?string $salt;
    public function getSalt(): ?string
    {
        return $this->salt;
    }


    /**
     * @see UserInterface
     */
    private ?string $plainTextPassword;
    public function getPlainTextPassword(): ?string
    {
        return $this->plainTextPassword;
    }

    public function setPlainTextPassword(?string $plainTextPassword): self
    {
        $this->plainTextPassword = $plainTextPassword ?? null;
        return $this;
    }


    /**
     * @see UserInterface
     */
    public function eraseCredentials(): self
    {
        $this->plainTextPassword = null;
        return $this;
    }


    /**
     * @ORM\Column(type="string", length=255, nullable=false)
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

    #[Pure]
    public function __construct()
    {
        $this->id = 0;
        $this->firstName = null;
        $this->lastName = '';
        $this->dataOperator = new UserDataOperator();
        $this->password = null;
        $this->salt = null;
        $this->plainTextPassword = null;
        $this->username = '';
    }
}
