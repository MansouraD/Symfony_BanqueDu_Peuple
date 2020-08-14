<?php

namespace App\Entity;

use App\Repository\ClientsEntreprisesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientsEntreprisesRepository::class)
 */
class ClientsEntreprises
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
    private $statut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $denomination;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ninea;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mail;

    /**
     * @ORM\OneToMany(targetEntity=Comptes::class, mappedBy="clientsEntreprises")
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

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
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

    public function getNinea(): ?string
    {
        return $this->ninea;
    }

    public function setNinea(string $ninea): self
    {
        $this->ninea = $ninea;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * @return Collection|Comptes[]
     */
    public function getOneToMany(): Collection
    {
        return $this->OneToMany;
    }

    public function addOneToMany(Comptes $oneToMany): self
    {
        if (!$this->OneToMany->contains($oneToMany)) {
            $this->OneToMany[] = $oneToMany;
            $oneToMany->setClientsEntreprises($this);
        }

        return $this;
    }

    public function removeOneToMany(Comptes $oneToMany): self
    {
        if ($this->OneToMany->contains($oneToMany)) {
            $this->OneToMany->removeElement($oneToMany);
            // set the owning side to null (unless already changed)
            if ($oneToMany->getClientsEntreprises() === $this) {
                $oneToMany->setClientsEntreprises(null);
            }
        }

        return $this;
    }
}
