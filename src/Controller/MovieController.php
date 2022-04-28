<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    private const MOVIES = [
        ['9 Bullets','2022-04-22', 'action'],
        ['The nameless days', '2022-04-01', 'unknown'],
        ['Incarnation', '2022-02-18', 'unknown'],
    ];

    #[Route('/movie/{id}', name: 'app_movie')]
    public function index(?int $id = null): Response
    {
        return $this->render('movie/index.html.twig', [
            'movies' => self::MOVIES,
            'current' => self::MOVIES[$id] ?? null,
        ]);
    }
}
