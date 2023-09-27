<?php

namespace App\Entity;

use App\Repository\ModeleBatterieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModeleBatterieRepository::class)]
class ModeleBatterie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $capacite = null;

    #[ORM\Column(length: 255)]
    private ?string $fabricant = null;

    #[ORM\OneToMany(mappedBy: 'modeleBatterie', targetEntity: Contrat::class)]
    private Collection $contrats;

    #[ORM\ManyToMany(targetEntity: TypeCharge::class, inversedBy: 'modeleBatteries')]
    private Collection $typeCharge;

    public function __construct()
    {
        $this->contrats = new ArrayCollection();
        $this->typeCharge = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCapacite(): ?string
    {
        return $this->capacite;
    }

    public function setCapacite(string $capacite): static
    {
        $this->capacite = $capacite;

        return $this;
    }

    public function getFabricant(): ?string
    {
        return $this->fabricant;
    }

    public function setFabricant(string $fabricant): static
    {
        $this->fabricant = $fabricant;

        return $this;
    }

    /**
     * @return Collection<int, Contrat>
     */
    public function getContrats(): Collection
    {
        return $this->contrats;
    }

    public function addContrat(Contrat $contrat): static
    {
        if (!$this->contrats->contains($contrat)) {
            $this->contrats->add($contrat);
            $contrat->setModeleBatterie($this);
        }

        return $this;
    }

    public function removeContrat(Contrat $contrat): static
    {
        if ($this->contrats->removeElement($contrat)) {
            // set the owning side to null (unless already changed)
            if ($contrat->getModeleBatterie() === $this) {
                $contrat->setModeleBatterie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TypeCharge>
     */
    public function getTypeCharge(): Collection
    {
        return $this->typeCharge;
    }

    public function addTypeCharge(TypeCharge $typeCharge): static
    {
        if (!$this->typeCharge->contains($typeCharge)) {
            $this->typeCharge->add($typeCharge);
        }

        return $this;
    }

    public function removeTypeCharge(TypeCharge $typeCharge): static
    {
        $this->typeCharge->removeElement($typeCharge);

        return $this;
    }
}
