<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
class Box
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: BoxType::class)]
    private BoxType $type;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(allowNull: true)]
    #[Assert\Length(max: 100)]
    protected ?string $label = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(allowNull: true)]
    #[Assert\Length(max: 100)]
    protected ?string $color = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(allowNull: true)]
    #[Assert\Length(max: 100)]
    protected ?string $additionalInformation = null;

    #[ORM\OneToMany(targetEntity: Item::class, mappedBy: 'box', cascade: ['persist', 'remove'])]
    protected Collection $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): BoxType
    {
        return $this->type;
    }

    public function setType(BoxType $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): self
    {
        $this->label = $label;
        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;
        return $this;
    }

    public function getAdditionalInformation(): ?string
    {
        return $this->additionalInformation;
    }

    public function setAdditionalInformation(?string $additionalInformation): self
    {
        $this->additionalInformation = $additionalInformation;
        return $this;
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items->add($item);
            $item->setBox($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->items->contains($item)) {
            $this->items->removeElement($item);
        }

        return $this;
    }
}