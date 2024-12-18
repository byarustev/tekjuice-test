<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Circle;

class CircleController extends AbstractController
{
    #[Route('/circle/{radius}', name: 'circle_calculation', methods: ['GET'])]
    public function calculateCircle(float $radius): Response
    {
        $circle = new Circle();
        $circle->setRadius($radius);

        $surface = $circle->calculateSurface();
        $circumference = $circle->calculateCircumference();

        // Return a JSON response
        return new JsonResponse([
            'type' => 'circle',
            'radius' => $radius,
            'surface' => round($surface, 2),
            'circumference' => round($circumference, 2),
        ]);
    
    }
}
