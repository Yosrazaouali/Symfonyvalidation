<?php

namespace App\Entity;

use App\Repository\FormationnRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationnRepository::class)]
class Formationn
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateFor = null;

    #[ORM\Column(length: 255)]
    private ?string $nomFor = null;

    #[ORM\Column]
    private ?int $numbrMaxPer = null;

    #[ORM\ManyToOne(inversedBy: 'formationns')]
    private ?Formateur $idFormateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateFor(): ?\DateTimeInterface
    {
        return $this->dateFor;
    }

    public function setDateFor(\DateTimeInterface $dateFor): static
    {
        $this->dateFor = $dateFor;

        return $this;
    }

    public function getNomFor(): ?string
    {
        return $this->nomFor;
    }

    public function setNomFor(string $nomFor): static
    {
        $this->nomFor = $nomFor;

        return $this;
    }

    public function getNumbrMaxPer(): ?int
    {
        return $this->numbrMaxPer;
    }

    public function setNumbrMaxPer(int $numbrMaxPer): static
    {
        $this->numbrMaxPer = $numbrMaxPer;

        return $this;
    }

    public function getIdFormateur(): ?Formateur
    {
        return $this->idFormateur;
    }

    public function setIdFormateur(?Formateur $idFormateur): static
    {
        $this->idFormateur = $idFormateur;

        return $this;
    }
}
