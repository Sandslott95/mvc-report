<?php

// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    #[Route('/lucky', name: 'lucky')]
    public function index(): Response
    {
        $images = [
            'build/images/leaf_256x256.png',
            'build/images/fyrklöver.jpg'
        ];

        $randomImage = $images[array_rand($images)];
        $luckyNumber = random_int(1, 100);

        return $this->render('lucky/index.html.twig', [
            'luckyNumber' => $luckyNumber,
            'imagePath' => $randomImage
        ]);
    }
}