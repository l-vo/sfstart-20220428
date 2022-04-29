<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private const LAST_MOVIES_COUNT = 6;

    #[Route('/', name: 'app_home')]
    public function index(MovieRepository $movieRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'last_movies' => $movieRepository->findLastMovies(self::LAST_MOVIES_COUNT),
        ]);
    }
}
