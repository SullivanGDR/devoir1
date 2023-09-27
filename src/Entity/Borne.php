<?php

namespace App\Entity;

use App\Repository\BorneRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BorneRepository::class)]
class Borne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateMiseEnService = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateDerniereRevision = null;

    #[ORM\ManyToOne(inversedBy: 'bornes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeCharge $typeCharge = null;

    #[ORM\ManyToOne(inversedBy: 'bornes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Station $station = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateMiseEnService(): ?\DateTimeInterface
    {
        return $this->dateMiseEnService;
    }

    public function setDateMiseEnService(\DateTimeInterface $dateMiseEnService): static
    {
        $this->dateMiseEnService = $dateMiseEnService;

        return $this;
    }

    public function getDateDerniereRevision(): ?\DateTimeInterface
    {
        return $this->dateDerniereRevision;
    }

    public function setDateDerniereRevision(\DateTimeInterface $dateDerniereRevision): static
    {
        $this->dateDerniereRevision = $dateDerniereRevision;

        return $this;
    }

    public function getTypeCharge(): ?TypeCharge
    {
        return $this->typeCharge;
    }

    public function setTypeCharge(?TypeCharge $typeCharge): static
    {
        $this->typeCharge = $typeCharge;

        return $this;
    }

    public function getStation(): ?Station
    {
        return $this->station;
    }

    public function setStation(?Station $station): static
    {
        $this->station = $station;

        return $this;
    }
}
