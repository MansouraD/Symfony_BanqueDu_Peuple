<?php

namespace App\Entity;

use App\Repository\EmployeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployeurRepository::class)
 */
class Employeur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $denomination;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $raison_social;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero_identification;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\OneToMany(targetEntity=ClientsParticuliers::class, mappedBy="employeur")
     */
    private $OneToMany;

    public function __construct()
    {
        $this->OneToMany = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDenomination(): ?string
    {
        return $this->denomination;
    }

    public function setDenomination(string $denomination): self
    {
        $this->denomination = $denomination;

        return $this;
    }

    public function getRaisonSocial(): ?string
    {
        return $this->raison_social;
    }

    public function setRaisonSocial(?string $raison_social): self
    {
        $this->raison_social = $raison_social;

        return $this;
    }

    public function getNumeroIdentification(): ?string
    {
        return $this->numero_identification;
    }

    public function setNumeroIdentification(string $numero_identification): self
    {
        $this->numero_identification = $numero_identification;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection|ClientsParticuliers[]
     */
    public function getOneToMany(): Collection
    {
        return $this->OneToMany;
    }

    public function addOneToMany(ClientsParticuliers $oneToMany): self
    {
        if (!$this->OneToMany->contains($oneToMany)) {
            $this->OneToMany[] = $oneToMany;
            $oneToMany->setEmployeur($this);
        }

        return $this;
    }

    public function removeOneToMany(ClientsParticuliers $oneToMany): self
    {
        if ($this->OneToMany->contains($oneToMany)) {
            $this->OneToMany->removeElement($oneToMany);
            // set the owning side to null (unless already changed)
            if ($oneToMany->getEmployeur() === $this) {
                $oneToMany->setEmployeur(null);
            }
        }

        return $this;
    }
}
