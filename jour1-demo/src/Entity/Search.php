<?php

namespace App\Entity;

use App\Repository\SearchRepository;
//use Doctrine\ORM\Mapping as ORM;

//#[ORM\Entity(repositoryClass: SearchRepository::class)]
class Search
{
    //#[ORM\Id]
    //#[ORM\GeneratedValue]
    //#[ORM\Column]
    private ?int $id = null;

    //#[ORM\Column(length: 255, nullable: true)]
    private ?string $texte = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(?string $texte): static
    {
        $this->texte = $texte;

        return $this;
    }
}
