<?php

namespace App\Entity;

use App\Repository\AvVoyageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvVoyageRepository::class)]
class AvVoyage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $prix = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $debut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fin = null;

    /**
     * @var Collection<int, AvCategorie>
     */
    #[ORM\ManyToMany(targetEntity: AvCategorie::class, inversedBy: 'VoyageACategorie')]
    private Collection $AvCategorie;

    #[ORM\ManyToOne(inversedBy: 'VoyageAPays')]
    private ?AvPays $AvPays = null;

    /**
     * @var Collection<int, AvImage>
     */
    #[ORM\ManyToMany(targetEntity: AvImage::class, inversedBy: 'VoyageAImage')]
    private Collection $AvImage;

    /**
     * @var Collection<int, AvReservation>
     */
    #[ORM\OneToMany(targetEntity: AvReservation::class, mappedBy: 'VoyageAReservation')]
    private Collection $AvReservation;

    #[ORM\ManyToOne(inversedBy: 'AvVoyage')]
    private ?Utilisateur $UtilisateurGereVoyage = null;

    public function __construct()
    {
        $this->AvCategorie = new ArrayCollection();
        $this->AvImage = new ArrayCollection();
        $this->AvReservation = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDebut(): ?\DateTimeInterface
    {
        return $this->debut;
    }

    public function setDebut(\DateTimeInterface $debut): static
    {
        $this->debut = $debut;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface
    {
        return $this->fin;
    }

    public function setFin(\DateTimeInterface $fin): static
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * @return Collection<int, AvCategorie>
     */
    public function getAvCategorie(): Collection
    {
        return $this->AvCategorie;
    }

    public function addAvCategorie(AvCategorie $avCategorie): static
    {
        if (!$this->AvCategorie->contains($avCategorie)) {
            $this->AvCategorie->add($avCategorie);
        }

        return $this;
    }

    public function removeAvCategorie(AvCategorie $avCategorie): static
    {
        $this->AvCategorie->removeElement($avCategorie);

        return $this;
    }

    public function getAvPays(): ?AvPays
    {
        return $this->AvPays;
    }

    public function setAvPays(?AvPays $AvPays): static
    {
        $this->AvPays = $AvPays;

        return $this;
    }

    /**
     * @return Collection<int, AvImage>
     */
    public function getAvImage(): Collection
    {
        return $this->AvImage;
    }

    public function addAvImage(AvImage $avImage): static
    {
        if (!$this->AvImage->contains($avImage)) {
            $this->AvImage->add($avImage);
        }

        return $this;
    }

    public function removeAvImage(AvImage $avImage): static
    {
        $this->AvImage->removeElement($avImage);

        return $this;
    }

    /**
     * @return Collection<int, AvReservation>
     */
    public function getAvReservation(): Collection
    {
        return $this->AvReservation;
    }

    public function addAvReservation(AvReservation $avReservation): static
    {
        if (!$this->AvReservation->contains($avReservation)) {
            $this->AvReservation->add($avReservation);
            $avReservation->setVoyageAReservation($this);
        }

        return $this;
    }

    public function removeAvReservation(AvReservation $avReservation): static
    {
        if ($this->AvReservation->removeElement($avReservation)) {
            // set the owning side to null (unless already changed)
            if ($avReservation->getVoyageAReservation() === $this) {
                $avReservation->setVoyageAReservation(null);
            }
        }

        return $this;
    }

    public function getUtilisateurGereVoyage(): ?Utilisateur
    {
        return $this->UtilisateurGereVoyage;
    }

    public function setUtilisateurGereVoyage(?Utilisateur $UtilisateurGereVoyage): static
    {
        $this->UtilisateurGereVoyage = $UtilisateurGereVoyage;

        return $this;
    }
}
