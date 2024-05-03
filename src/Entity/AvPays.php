<?php

namespace App\Entity;

use App\Repository\AvPaysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvPaysRepository::class)]
class AvPays
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    /**
     * @var Collection<int, AvVoyage>
     */
    #[ORM\OneToMany(targetEntity: AvVoyage::class, mappedBy: 'AvPays')]
    private Collection $VoyageAPays;

    public function __construct()
    {
        $this->VoyageAPays = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, AvVoyage>
     */
    public function getVoyageAPays(): Collection
    {
        return $this->VoyageAPays;
    }

    public function addVoyageAPay(AvVoyage $voyageAPay): static
    {
        if (!$this->VoyageAPays->contains($voyageAPay)) {
            $this->VoyageAPays->add($voyageAPay);
            $voyageAPay->setAvPays($this);
        }

        return $this;
    }

    public function removeVoyageAPay(AvVoyage $voyageAPay): static
    {
        if ($this->VoyageAPays->removeElement($voyageAPay)) {
            // set the owning side to null (unless already changed)
            if ($voyageAPay->getAvPays() === $this) {
                $voyageAPay->setAvPays(null);
            }
        }

        return $this;
    }
}
