<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Triangle;

class TriangleController extends AbstractController
{
    #[Route('/triangle/{a}/{b}/{c}', name: 'triangle_calculation', methods: ['GET'])]
    public function calculateTriangle(float $a, float $b, float $c): Response
    {
        // Validate if the sides form a valid triangle
        if ($a + $b <= $c || $a + $c <= $b || $b + $c <= $a) {
            return new Response("Invalid triangle sides.", Response::HTTP_BAD_REQUEST);
        }

        $triangle = new Triangle();
        $triangle->setA($a);
        $triangle->setB($b);
        $triangle->setC($c);

        $surface = $triangle->calculateSurface();
        $circumference = $triangle->calculateCircumference();

        //response data
        $data = [
            "type" => "triangle",
            "a" => $a,
            "b" => $b,
            "c" => $c,
            "surface" => $surface,
            "circumference" => $circumference,
        ];

        return new JsonResponse($data);
    }
}
