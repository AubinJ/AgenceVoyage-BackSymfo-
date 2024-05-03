<?php

namespace App\Entity;

use App\Repository\AvImageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvImageRepository::class)]
class AvImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $url = null;

    /**
     * @var Collection<int, AvVoyage>
     */
    #[ORM\ManyToMany(targetEntity: AvVoyage::class, mappedBy: 'AvImage')]
    private Collection $VoyageAImage;

    public function __construct()
    {
        $this->VoyageAImage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return Collection<int, AvVoyage>
     */
    public function getVoyageAImage(): Collection
    {
        return $this->VoyageAImage;
    }

    public function addVoyageAImage(AvVoyage $voyageAImage): static
    {
        if (!$this->VoyageAImage->contains($voyageAImage)) {
            $this->VoyageAImage->add($voyageAImage);
            $voyageAImage->addAvImage($this);
        }

        return $this;
    }

    public function removeVoyageAImage(AvVoyage $voyageAImage): static
    {
        if ($this->VoyageAImage->removeElement($voyageAImage)) {
            $voyageAImage->removeAvImage($this);
        }

        return $this;
    }
}
