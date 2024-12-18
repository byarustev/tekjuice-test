<?php

namespace App\Entity;

use App\Repository\TriangleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TriangleRepository::class)]
class Triangle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $a = null;

    #[ORM\Column]
    private ?float $b = null;

    #[ORM\Column]
    private ?float $c = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getA(): ?float
    {
        return $this->a;
    }

    public function setA(float $a): static
    {
        $this->a = $a;

        return $this;
    }

    public function getB(): ?float
    {
        return $this->b;
    }

    public function setB(float $b): static
    {
        $this->b = $b;

        return $this;
    }

    public function getC(): ?float
    {
        return $this->c;
    }

    public function setC(float $c): static
    {
        $this->c = $c;

        return $this;
    }

    /**
     * Calculate the surface area of the triangle using Heron's formula.
     *
     * @return float
     * @throws \InvalidArgumentException
     */
    public function calculateSurface(): float
    {
        // Ensure the sides form a valid triangle
        if ($this->a + $this->b <= $this->c ||
            $this->a + $this->c <= $this->b ||
            $this->b + $this->c <= $this->a) {
            throw new \InvalidArgumentException('The provided sides do not form a valid triangle.');
        }

        // Semi-perimeter
        $semiPerimeter = ($this->sideA + $this->sideB + $this->sideC) / 2;

        // Area calculation using Heron's formula
        return sqrt($semiPerimeter * ($semiPerimeter - $this->sideA) * ($semiPerimeter - $this->sideB) * ($semiPerimeter - $this->sideC));
    }

    /**
     * Calculate the diameter (longest side) of the triangle.
     *
     * @return float
     */
    public function calculateDiameter(): float
    {
        return max($this->a, $this->b, $this->c);
    }
}
