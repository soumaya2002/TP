<?php

/**
 * @Corporation : Clic Silver.
 * @Author: Brice POTE <brice.pote@gmail.com>.
 * Copyright (c) 2021.
 * All Rights Reserved.
 */

declare(strict_types=1);

namespace App\Entity;

interface UserDataCustomerInterface
{
    public function getAdresse(): ?string;
    public function setAdresse(?string $_adresse = null): self;
}
