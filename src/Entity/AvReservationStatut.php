<?php

namespace App\Entity;

use App\Repository\AvReservationStatutRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvReservationStatutRepository::class)]
class AvReservationStatut
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    /**
     * @var Collection<int, AvReservation>
     */
    #[ORM\OneToMany(targetEntity: AvReservation::class, mappedBy: 'AvReservationStatut')]
    private Collection $ReservationAStatut;

    public function __construct()
    {
        $this->ReservationAStatut = new ArrayCollection();
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
     * @return Collection<int, AvReservation>
     */
    public function getReservationAStatut(): Collection
    {
        return $this->ReservationAStatut;
    }

    public function addReservationAStatut(AvReservation $reservationAStatut): static
    {
        if (!$this->ReservationAStatut->contains($reservationAStatut)) {
            $this->ReservationAStatut->add($reservationAStatut);
            $reservationAStatut->setAvReservationStatut($this);
        }

        return $this;
    }

    public function removeReservationAStatut(AvReservation $reservationAStatut): static
    {
        if ($this->ReservationAStatut->removeElement($reservationAStatut)) {
            // set the owning side to null (unless already changed)
            if ($reservationAStatut->getAvReservationStatut() === $this) {
                $reservationAStatut->setAvReservationStatut(null);
            }
        }

        return $this;
    }
}
