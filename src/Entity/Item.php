<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
class Item
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    protected string $name;

    #[ORM\Column]
    #[Assert\NotBlank(allowNull: true)]
    protected ?string $description = null;

    #[ORM\ManyToOne(targetEntity: Box::class, inversedBy: 'items')]
    private Box $box;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getBox(): Box
    {
        return $this->box;
    }

    public function setBox(Box $box): self
    {
        $this->box = $box;
        return $this;
    }
}