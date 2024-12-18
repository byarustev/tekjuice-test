<?php

namespace App\Entity;

use App\Repository\CircleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CircleRepository::class)]
class Circle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $radius = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRadius(): ?float
    {
        return $this->radius;
    }

    public function setRadius(float $radius): static
    {
        $this->radius = $radius;

        return $this;
    }

     /**
     * Calculate the surface area
     *
     * @return float
     */
    public function calculateSurface(): float
    {
        return pi() * pow($this->radius, 2);
    }
}
