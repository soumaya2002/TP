<?php

/**
 * @Corporation : Clic Silver.
 * @Author: Brice POTE <brice.pote@gmail.com>.
 * Copyright (c) 2021.
 * All Rights Reserved.
 */

declare(strict_types=1);

namespace App\Entity;

interface UserDataProfessionalInterface
{
    public function getProfession(): ?string;
    public function setProfession(?string $_profession = null): self;
}
