<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VideoSectionController extends AbstractController
{
    #[Route('/video/section', name: 'app_video_section')]
    public function index(): Response
    {
        return $this->render('video_section/index.html.twig', [
            'controller_name' => 'VideoSectionController',
        ]);
    }
}
