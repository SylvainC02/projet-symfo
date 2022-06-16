<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'integer')]
    private $given_points;

<<<<<<< HEAD
    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Objet::class)]
=======
    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Objet::class)]
>>>>>>> 8a1df17a15f9ea6366a4b127000b39ba9f93c067
    private $objets;

    public function __construct()
    {
        $this->objets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getGivenPoints(): ?int
    {
        return $this->given_points;
    }

    public function setGivenPoints(int $given_points): self
    {
        $this->given_points = $given_points;

        return $this;
    }

    /**
     * @return Collection<int, Objet>
     */
    public function getObjets(): Collection
    {
        return $this->objets;
    }

    public function addObjet(Objet $objet): self
    {
        if (!$this->objets->contains($objet)) {
            $this->objets[] = $objet;
<<<<<<< HEAD
            $objet->setCategory($this);
=======
            $objet->setCategorie($this);
>>>>>>> 8a1df17a15f9ea6366a4b127000b39ba9f93c067
        }

        return $this;
    }

    public function removeObjet(Objet $objet): self
    {
        if ($this->objets->removeElement($objet)) {
            // set the owning side to null (unless already changed)
<<<<<<< HEAD
            if ($objet->getCategory() === $this) {
                $objet->setCategory(null);
=======
            if ($objet->getCategorie() === $this) {
                $objet->setCategorie(null);
>>>>>>> 8a1df17a15f9ea6366a4b127000b39ba9f93c067
            }
        }

        return $this;
    }
<<<<<<< HEAD
=======

>>>>>>> 8a1df17a15f9ea6366a4b127000b39ba9f93c067
    public function __toString()
    {
        return $this->name;
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 8a1df17a15f9ea6366a4b127000b39ba9f93c067
