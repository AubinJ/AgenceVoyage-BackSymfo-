<?php

namespace App\Entity;

use App\Repository\AvRoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvRoleRepository::class)]
class AvRole
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    /**
     * @var Collection<int, Utilisateur>
     */
    #[ORM\OneToMany(targetEntity: Utilisateur::class, mappedBy: 'AvRole')]
    private Collection $UtilisateurARole;

    public function __construct()
    {
        $this->UtilisateurARole = new ArrayCollection();
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
     * @return Collection<int, Utilisateur>
     */
    public function getUtilisateurARole(): Collection
    {
        return $this->UtilisateurARole;
    }

    public function addUtilisateurARole(Utilisateur $utilisateurARole): static
    {
        if (!$this->UtilisateurARole->contains($utilisateurARole)) {
            $this->UtilisateurARole->add($utilisateurARole);
            $utilisateurARole->setAvRole($this);
        }

        return $this;
    }

    public function removeUtilisateurARole(Utilisateur $utilisateurARole): static
    {
        if ($this->UtilisateurARole->removeElement($utilisateurARole)) {
            // set the owning side to null (unless already changed)
            if ($utilisateurARole->getAvRole() === $this) {
                $utilisateurARole->setAvRole(null);
            }
        }

        return $this;
    }
}
