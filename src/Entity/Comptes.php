<?php

namespace App\Entity;

use App\Repository\ComptesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ComptesRepository::class)
 */
class Comptes
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
    private $type_compte;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero_agence;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero_compte;

    /**
     * @ORM\Column(type="integer")
     */
    private $cle_rib;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $frais_ouverture;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $_cni;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $_ninea;

    /**
     * @ORM\ManyToOne(targetEntity=ClientsEntreprises::class, inversedBy="OneToMany")
     */
    private $clientsEntreprises;

    /**
     * @ORM\ManyToOne(targetEntity=ClientsParticuliers::class, inversedBy="OneToMany")
     */
    private $clientsParticuliers;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeCompte(): ?string
    {
        return $this->type_compte;
    }

    public function setTypeCompte(string $type_compte): self
    {
        $this->type_compte = $type_compte;

        return $this;
    }

    public function getNumeroAgence(): ?string
    {
        return $this->numero_agence;
    }

    public function setNumeroAgence(string $numero_agence): self
    {
        $this->numero_agence = $numero_agence;

        return $this;
    }

    public function getNumeroCompte(): ?int
    {
        return $this->numero_compte;
    }

    public function setNumeroCompte(int $numero_compte): self
    {
        $this->numero_compte = $numero_compte;

        return $this;
    }

    public function getCleRib(): ?int
    {
        return $this->cle_rib;
    }

    public function setCleRib(int $cle_rib): self
    {
        $this->cle_rib = $cle_rib;

        return $this;
    }

    public function getFraisOuverture(): ?int
    {
        return $this->frais_ouverture;
    }

    public function setFraisOuverture(?int $frais_ouverture): self
    {
        $this->frais_ouverture = $frais_ouverture;

        return $this;
    }

    public function getCni(): ?int
    {
        return $this->_cni;
    }

    public function setCni(?int $_cni): self
    {
        $this->_cni = $_cni;

        return $this;
    }

    public function getNinea(): ?int
    {
        return $this->_ninea;
    }

    public function setNinea(?int $_ninea): self
    {
        $this->_ninea = $_ninea;

        return $this;
    }

    public function getClientsEntreprises(): ?ClientsEntreprises
    {
        return $this->clientsEntreprises;
    }

    public function setClientsEntreprises(?ClientsEntreprises $clientsEntreprises): self
    {
        $this->clientsEntreprises = $clientsEntreprises;

        return $this;
    }

    public function getClientsParticuliers(): ?ClientsParticuliers
    {
        return $this->clientsParticuliers;
    }

    public function setClientsParticuliers(?ClientsParticuliers $clientsParticuliers): self
    {
        $this->clientsParticuliers = $clientsParticuliers;

        return $this;
    }
}
