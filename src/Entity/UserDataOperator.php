<?php

/**
 * @Corporation Clic Silver.
 * @Author Brice POTE <brice.pote@gmail.com>.
 * Copyright (c) 2021.
 * All Rights Reserved.
 */

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

final class UserDataOperator
{
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $comment;
    public function getComments(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment ?? null;
        return $this;
    }

    public function __construct()
    {
        $this->comment = null;
    }
}
