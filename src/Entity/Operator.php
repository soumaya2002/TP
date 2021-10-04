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

/**
 * Operator
 *
 * @ORM\Entity(repositoryClass=App\Repository\OperatorRepository")
 */
class Operator implements UserAppInterface, UserDataOperatorInterface
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

    public function setFirstsName(string $firstName): self
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

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private string $comments;
    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComment(?string $_comments): self
    {
        // TODO: Implement setComment() method.
        $this->comments = $_comments;
        return $this;
    }
}
