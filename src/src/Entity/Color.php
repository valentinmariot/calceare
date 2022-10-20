<?php

namespace App\Entity;

use App\Repository\ColorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ColorRepository::class)]
class Color
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $product_color = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductColor(): ?string
    {
        return $this->product_color;
    }

    public function setProductColor(string $product_color): self
    {
        $this->product_color = $product_color;

        return $this;
    }
}
