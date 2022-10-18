<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\Column(length: 500)]
    private ?string $password = null;

    #[ORM\Column(length: 50)]
    private ?string $username = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $picture = null;

    #[ORM\Column(length: 25)]
    private ?string $role = null;

    #[ORM\Column(nullable: true)]
    private ?int $rating = null;

    #[ORM\Column(nullable: true)]
    private ?int $RatingCount = null;

    #[ORM\Column(nullable: true)]
    private ?int $ratingTotal = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(?int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getRatingCount(): ?int
    {
        return $this->RatingCount;
    }

    public function setRatingCount(?int $RatingCount): self
    {
        $this->RatingCount = $RatingCount;

        return $this;
    }

    public function getRatingTotal(): ?int
    {
        return $this->ratingTotal;
    }

    public function setRatingTotal(?int $ratingTotal): self
    {
        $this->ratingTotal = $ratingTotal;

        return $this;
    }
}
