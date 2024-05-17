<?php

namespace App\Entity;

use App\Repository\AvCategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: AvCategorieRepository::class)]
class AvCategorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['api_categorie_index'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups('api_trips_show')]
    private ?string $nom = null;

    /**
     * @var Collection<int, AvVoyage>
     */
    #[ORM\ManyToMany(targetEntity: AvVoyage::class, mappedBy: 'AvCategorie')]
    private Collection $VoyageACategorie;

    public function __construct()
    {
        $this->VoyageACategorie = new ArrayCollection();
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
    public function getVoyageACategorie(): Collection
    {
        return $this->VoyageACategorie;
    }

    public function addVoyageACategorie(AvVoyage $voyageACategorie): static
    {
        if (!$this->VoyageACategorie->contains($voyageACategorie)) {
            $this->VoyageACategorie->add($voyageACategorie);
            $voyageACategorie->addAvCategorie($this);
        }

        return $this;
    }

    public function removeVoyageACategorie(AvVoyage $voyageACategorie): static
    {
        if ($this->VoyageACategorie->removeElement($voyageACategorie)) {
            $voyageACategorie->removeAvCategorie($this);
        }

        return $this;
    }
}
