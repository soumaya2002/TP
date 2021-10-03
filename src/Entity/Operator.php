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

/**
 * Provides an object for UserApp Application Operator
 */
class Operator implements UserAppInterface
{
    private string $firstName;
    private string $lastName;

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstsName(string $_firstName): UserAppInterface
    {
        $this->firstName = $_firstName;
        return $this;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $_lastName): UserAppInterface
    {
        $this->lastName = $_lastName;
        return $this;
    }
}
