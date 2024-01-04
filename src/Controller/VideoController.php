<?php

namespace App\Controller;

use App\Repository\VideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use App\Entity\Video;
use Doctrine\ORM\EntityManagerInterface;

class VideoController extends AbstractController
{
    #[Route('/video', name: 'app_video')]
    public function index(): Response
    {
        return $this->render('video/index.html.twig', [
            'controller_name' => 'VideoController',
        ]);
    }

    #[Route('/public-videos', name: 'public-videos')]
    public function publicVideos(VideoRepository $videoRepository): Response
    {
        $videos = $videoRepository->findAllPublic();

        return $this->render('video/public.html.twig', [
            'videos' => $videos,
        ]);
    }

    #[Route("/video/{slugVideo}", name: "show_video")]
    public function showVideo(SluggerInterface $slugger, Video $video, VideoRepository $videoRepository): Response
    {
        $slug = $slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $videos = $videoRepository->findAllPublic();

        return $this->render('video/show.html.twig', [
            'video' => $video,
            'videos' => $videos,
        ]);
    }
}
