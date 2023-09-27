<?php

namespace App\Entity;

use App\Repository\ContratRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContratRepository::class)]
class Contrat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateContrat = null;

    #[ORM\Column(length: 255)]
    private ?string $noImmatriculation = null;

    #[ORM\ManyToOne(inversedBy: 'contrats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Usager $usager = null;

    #[ORM\ManyToOne(inversedBy: 'contrats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ModeleBatterie $modeleBatterie = null;

    #[ORM\OneToMany(mappedBy: 'contrat', targetEntity: OperationRechargement::class)]
    private Collection $operationRechargements;

    public function __construct()
    {
        $this->operationRechargements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateContrat(): ?\DateTimeInterface
    {
        return $this->dateContrat;
    }

    public function setDateContrat(\DateTimeInterface $dateContrat): static
    {
        $this->dateContrat = $dateContrat;

        return $this;
    }

    public function getNoImmatriculation(): ?string
    {
        return $this->noImmatriculation;
    }

    public function setNoImmatriculation(string $noImmatriculation): static
    {
        $this->noImmatriculation = $noImmatriculation;

        return $this;
    }

    public function getUsager(): ?Usager
    {
        return $this->usager;
    }

    public function setUsager(?Usager $usager): static
    {
        $this->usager = $usager;

        return $this;
    }

    public function getModeleBatterie(): ?ModeleBatterie
    {
        return $this->modeleBatterie;
    }

    public function setModeleBatterie(?ModeleBatterie $modeleBatterie): static
    {
        $this->modeleBatterie = $modeleBatterie;

        return $this;
    }

    /**
     * @return Collection<int, OperationRechargement>
     */
    public function getOperationRechargements(): Collection
    {
        return $this->operationRechargements;
    }

    public function addOperationRechargement(OperationRechargement $operationRechargement): static
    {
        if (!$this->operationRechargements->contains($operationRechargement)) {
            $this->operationRechargements->add($operationRechargement);
            $operationRechargement->setContrat($this);
        }

        return $this;
    }

    public function removeOperationRechargement(OperationRechargement $operationRechargement): static
    {
        if ($this->operationRechargements->removeElement($operationRechargement)) {
            // set the owning side to null (unless already changed)
            if ($operationRechargement->getContrat() === $this) {
                $operationRechargement->setContrat(null);
            }
        }

        return $this;
    }
}
