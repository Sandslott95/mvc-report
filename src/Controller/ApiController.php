<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/api', name: 'api_home')]
    public function index(): Response
    {
        return $this->render('api/index.html.twig');
    }

    #[Route('/api/quote', name: 'quote')]
    public function quote(): Response
    {
        $quotes = [
            [
                'quote' => "Success is not final, failure is not fatal: It is the courage to continue that counts.",
                'author' => "Winston Churchill"
            ],
            [
                'quote' => "Appear weak when you are strong, and strong when you are weak.",
                'author' => "Sun Tzu"
            ],
            [
                'quote' => "Alea iacta est. (Tärningen är kastad.)",
                'author' => "Julius Caesar"
            ],
            [
                'quote' => "Veni, vidi, vici. (I came, I saw, I conquered.)",
                'author' => "Julius Caesar"
            ],
        ];

        $selected = $quotes[array_rand($quotes)];

        return $this->json([
            'quote' => $selected['quote'],
            'author' => $selected['author'],
            'date' => (new \DateTime())->format('Y-m-d'),
            $timestamp = (new \DateTime('now', new \DateTimeZone('Europe/Stockholm')))->format('Y-m-d H:i:s'),
        ]);
    }

}
