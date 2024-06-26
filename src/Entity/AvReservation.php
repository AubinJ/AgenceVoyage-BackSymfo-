<?php

namespace App\Entity;

use App\Repository\AvReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvReservationRepository::class)]
class AvReservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column]
    private ?int $tel = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $message = null;

    #[ORM\ManyToOne(inversedBy: 'AvReservation')]
    private ?AvVoyage $VoyageAReservation = null;

    #[ORM\ManyToOne(inversedBy: 'ReservationAStatut')]
    private ?AvReservationStatut $AvReservationStatut = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getVoyageAReservation(): ?AvVoyage
    {
        return $this->VoyageAReservation;
    }

    public function setVoyageAReservation(?AvVoyage $VoyageAReservation): static
    {
        $this->VoyageAReservation = $VoyageAReservation;

        return $this;
    }

    public function getAvReservationStatut(): ?AvReservationStatut
    {
        return $this->AvReservationStatut;
    }

    public function setAvReservationStatut(?AvReservationStatut $AvReservationStatut): static
    {
        $this->AvReservationStatut = $AvReservationStatut;

        return $this;
    }
}
