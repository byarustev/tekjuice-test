<?php

namespace App\Service;

use App\Entity\Circle;
use App\Entity\Triangle;

class GeometryCalculator
{
    public function calculateCircleData(float $radius): array
    {
        $circle = new Circle();
        $circle->setRadius($radius);

        $surface = $circle->calculateSurface();
        $circumference = $circle->calculateCircumference();

        return [
            'type' => 'circle',
            'radius' => $radius,
            'surface' => $surface,
            'circumference' => $circumference,
        ];
    }

    public function calculateTriangleData(float $a, float $b, float $c): array
    {
        $triangle = new Triangle();
        $triangle->setA($a);
        $triangle->setB($b);
        $triangle->setC($c);

        $surface = $triangle->calculateSurface();
        $circumference = $triangle->calculateCircumference();

        return [
            "type" => "triangle",
            "a" => $a,
            "b" => $b,
            "c" => $c,
            "surface" => round($surface, 2),
            "circumference" => round($circumference, 2),
        ];
    }

    public function sumDiameters(object $object1, object $object2): float
    {
        $diameter1 = 0;
        $diameter2 = 0;

        // NB. added the checks 
        // to ensure the object is of the expected type before calling calculateDiameter to
        // avoid errors if the method doesn't exist or the object type changes in the future.

        if ($object1 instanceof Circle) {
            $diameter1 = $object1->calculateDiameter();
        } elseif ($object1 instanceof Triangle) {
            $diameter1 = $object1->calculateDiameter();
        }

        if ($object2 instanceof Circle) {
            $diameter2 = $object2->calculateDiameter();
        } elseif ($object2 instanceof Triangle) {
            $diameter2 = $object2->calculateDiameter();
        }

        return $diameter1 + $diameter2;
    }

    
    public function sumAreas(object $object1, object $object2): float
    {
        $surface1 = 0;
        $surface2 = 0;

        // NB. added the checks 
        // to ensure the object is of the expected type before calling calculateDiameter to
        // avoid errors if the method doesn't exist or the object type changes in the future.

        if ($object1 instanceof Circle) {
            $surface1 = $object1->calculateSurface();
        } elseif ($object1 instanceof Triangle) {
            $surface1 = $object1->calculateSurface();
        }

        if ($object2 instanceof Circle) {
            $surface2 = $object2->calculateSurface();
        } elseif ($object2 instanceof Triangle) {
            $surface2 = $object2->calculateSurface();
        }

        return $surface1 + $surface2;
    }

}