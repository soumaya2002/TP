<?php

/**
 * @Corporation Clic Silver.
 * @Author Brice POTE <brice.pote@gmail.com>.
 * Copyright (c) 2021.
 * All Rights Reserved.
 */

namespace App\Entity;

interface UserDataOperatorInterface
{
    public function getComments(): ?string;
    public function setComment(?string $_comments): self;
}
