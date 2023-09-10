<?php

namespace App\Entity;

use App\Repository\FormateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormateurRepository::class)]
class Formateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $specialite = null;

    #[ORM\OneToMany(mappedBy: 'idFormateur', targetEntity: Formationn::class)]
    private Collection $formationns;

    public function __construct()
    {
        $this->formationns = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): static
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * @return Collection<int, Formationn>
     */
    public function getFormationns(): Collection
    {
        return $this->formationns;
    }

    public function addFormationn(Formationn $formationn): static
    {
        if (!$this->formationns->contains($formationn)) {
            $this->formationns->add($formationn);
            $formationn->setIdFormateur($this);
        }

        return $this;
    }

    public function removeFormationn(Formationn $formationn): static
    {
        if ($this->formationns->removeElement($formationn)) {
            // set the owning side to null (unless already changed)
            if ($formationn->getIdFormateur() === $this) {
                $formationn->setIdFormateur(null);
            }
        }

        return $this;
    }
}
