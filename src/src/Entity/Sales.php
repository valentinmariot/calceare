<?php

namespace App\Entity;

use App\Repository\SalesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalesRepository::class)]
class Sales
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_reviewed = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isIsReviewed(): ?bool
    {
        return $this->is_reviewed;
    }

    public function setIsReviewed(?bool $is_reviewed): self
    {
        $this->is_reviewed = $is_reviewed;

        return $this;
    }
}
