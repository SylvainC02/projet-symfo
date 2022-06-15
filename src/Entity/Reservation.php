<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $starting_date;

    #[ORM\Column(type: 'date')]
    private $ending_date;

    #[ORM\ManyToOne(targetEntity: Objet::class, inversedBy: 'reservations')]
    private $objet_id;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'reservations')]
    private $borrower_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartingDate(): ?\DateTimeInterface
    {
        return $this->starting_date;
    }

    public function setStartingDate(\DateTimeInterface $starting_date): self
    {
        $this->starting_date = $starting_date;

        return $this;
    }

    public function getEndingDate(): ?\DateTimeInterface
    {
        return $this->ending_date;
    }

    public function setEndingDate(\DateTimeInterface $ending_date): self
    {
        $this->ending_date = $ending_date;

        return $this;
    }

    public function getObjetId(): ?Objet
    {
        return $this->objet_id;
    }

    public function setObjetId(?Objet $objet_id): self
    {
        $this->objet_id = $objet_id;

        return $this;
    }

    public function getBorrowerId(): ?User
    {
        return $this->borrower_id;
    }

    public function setBorrowerId(?User $borrower_id): self
    {
        $this->borrower_id = $borrower_id;

        return $this;
    }
}
