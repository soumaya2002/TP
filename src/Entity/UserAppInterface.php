<?php
/**
 * @Corporation : Clic Silver.
 * @Author: Brice POTE <brice.pote@gmail.com>.
 * Copyright (c) 2021.
 * All Rights Reserved.
 */
declare(strict_types=1);

namespace App\Entity;

interface UserAppInterface
{
    public function getFirstName(): string;
    public function setFirstsName(string $_firstName): self;

    public function getLastName(): string;
    public function setLastName(string $_lastName);

}
