<?php

namespace App\Controller;

use App\Repository\VideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(VideoRepository $videoRepository): Response
    {
        $videos = $videoRepository->findAllPublic();

        return $this->render('home/index.html.twig', [
            'videos' => $videos,
        ]);
    }

    #[Route('/admin_gestion', name: 'app_test')]
    public function test(VideoRepository $videoRepository): Response
    {
        return $this->render('home/admin_gestion.html.twig');
    }
}
