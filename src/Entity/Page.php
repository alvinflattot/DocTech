<?php

namespace App\Entity;

use App\Repository\PageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PageRepository::class)
 */
class Page
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $nom;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Dossier::class, inversedBy="pages")
     */
    private $dossierMere;

    /**
     * @ORM\OneToMany(targetEntity=Fonction::class, mappedBy="page")
     */
    private $fonctions;

    public function __construct()
    {
        $this->dossierMere = new ArrayCollection();
        $this->fonctions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Dossier[]
     */
    public function getDossierMere(): Collection
    {
        return $this->dossierMere;
    }

    public function addDossierMere(Dossier $dossierMere): self
    {
        if (!$this->dossierMere->contains($dossierMere)) {
            $this->dossierMere[] = $dossierMere;
        }

        return $this;
    }

    public function removeDossierMere(Dossier $dossierMere): self
    {
        if ($this->dossierMere->contains($dossierMere)) {
            $this->dossierMere->removeElement($dossierMere);
        }

        return $this;
    }

    /**
     * @return Collection|Fonction[]
     */
    public function getFonctions(): Collection
    {
        return $this->fonctions;
    }

    public function addFonction(Fonction $fonction): self
    {
        if (!$this->fonctions->contains($fonction)) {
            $this->fonctions[] = $fonction;
            $fonction->setPage($this);
        }

        return $this;
    }

    public function removeFonction(Fonction $fonction): self
    {
        if ($this->fonctions->contains($fonction)) {
            $this->fonctions->removeElement($fonction);
            // set the owning side to null (unless already changed)
            if ($fonction->getPage() === $this) {
                $fonction->setPage(null);
            }
        }

        return $this;
    }
}
