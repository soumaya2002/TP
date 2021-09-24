<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\StatusRepository")
 */
class Status
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive = true;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private string $code = '';

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive(bool $isActive)
    {
        $this->isActive = $isActive;
    }


    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }


    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private string $label;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private string $value;

    /**
     * @var int
     *
     * @ORM\Column(name="`rank`")
     */
    private int $order;



    public function __toString(): string
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return Status
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Status
     */
    public function setValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $order
     * @return Status
     */
    public function setOrder(int $order): self
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $metaStatus;

    /**
     * @ORM\Column(type="boolean")
     */
    private ?bool $forStat;

    public function __construct()
    {
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }


    public function getMetaStatus(): ?string
    {
        return $this->metaStatus;
    }

    public function setMetaStatus(string $metaStatus): self
    {
        $this->metaStatus = $metaStatus;

        return $this;
    }

    public function getForStat(): ?bool
    {
        return $this->forStat;
    }

    public function setForStat(bool $forStat): self
    {
        $this->forStat = $forStat;

        return $this;
    }
}
