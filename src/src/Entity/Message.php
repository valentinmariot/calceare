<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $message_desc = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessageDesc(): ?string
    {
        return $this->message_desc;
    }

    public function setMessageDesc(string $message_desc): self
    {
        $this->message_desc = $message_desc;

        return $this;
    }
}
