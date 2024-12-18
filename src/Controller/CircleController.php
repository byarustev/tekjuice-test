<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Circle;
use Symfony\Component\Serializer\SerializerInterface;

class CircleController extends AbstractController
{
    #[Route('/circle/{radius}', name: 'circle_calculation', methods: ['GET'])]
    public function calculateCircle(float $radius, SerializerInterface $serializer): Response
    {
        $circle = new Circle();
        $circle->setRadius($radius);

        $surface = $circle->calculateSurface();
        $circumference = $circle->calculateCircumference();

        $data = [
            'type' => 'circle',
            'radius' => $radius,
            'surface' => round($surface, 2),
            'circumference' => round($circumference, 2),
        ];

        // Serialize the data into JSON
        $serializedData = $serializer->serialize($data, 'json');

        return new JsonResponse($serializedData, Response::HTTP_OK, [], true);
    
    }
}
