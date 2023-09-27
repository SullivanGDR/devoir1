<?php

namespace App\Entity;

use App\Repository\TypeChargeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeChargeRepository::class)]
class TypeCharge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelleTypeCharge = null;

    #[ORM\Column(length: 255)]
    private ?string $puissanceTypeCharge = null;

    #[ORM\OneToMany(mappedBy: 'typeCharge', targetEntity: Borne::class)]
    private Collection $bornes;

    #[ORM\ManyToMany(targetEntity: ModeleBatterie::class, mappedBy: 'typeCharge')]
    private Collection $modeleBatteries;


    public function __construct()
    {
        $this->bornes = new ArrayCollection();
        $this->modeleBatteries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleTypeCharge(): ?string
    {
        return $this->libelleTypeCharge;
    }

    public function setLibelleTypeCharge(string $libelleTypeCharge): static
    {
        $this->libelleTypeCharge = $libelleTypeCharge;

        return $this;
    }

    public function getPuissanceTypeCharge(): ?string
    {
        return $this->puissanceTypeCharge;
    }

    public function setPuissanceTypeCharge(string $puissanceTypeCharge): static
    {
        $this->puissanceTypeCharge = $puissanceTypeCharge;

        return $this;
    }

    /**
     * @return Collection<int, Borne>
     */
    public function getBornes(): Collection
    {
        return $this->bornes;
    }

    public function addBorne(Borne $borne): static
    {
        if (!$this->bornes->contains($borne)) {
            $this->bornes->add($borne);
            $borne->setTypeCharge($this);
        }

        return $this;
    }

    public function removeBorne(Borne $borne): static
    {
        if ($this->bornes->removeElement($borne)) {
            // set the owning side to null (unless already changed)
            if ($borne->getTypeCharge() === $this) {
                $borne->setTypeCharge(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ModeleBatterie>
     */
    public function getModeleBatteries(): Collection
    {
        return $this->modeleBatteries;
    }

    public function addModeleBattery(ModeleBatterie $modeleBattery): static
    {
        if (!$this->modeleBatteries->contains($modeleBattery)) {
            $this->modeleBatteries->add($modeleBattery);
            $modeleBattery->addTypeCharge($this);
        }

        return $this;
    }

    public function removeModeleBattery(ModeleBatterie $modeleBattery): static
    {
        if ($this->modeleBatteries->removeElement($modeleBattery)) {
            $modeleBattery->removeTypeCharge($this);
        }

        return $this;
    }
}
