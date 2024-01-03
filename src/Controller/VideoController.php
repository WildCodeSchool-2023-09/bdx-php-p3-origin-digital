<?php

namespace App\Controller;

use App\Repository\VideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use App\Entity\Video;
use App\Form\UploadVideoType;
use Doctrine\ORM\EntityManager;
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

    #[Route('/new', name: 'new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $video = new Video();

        $form = $this->createForm(UploadVideoType::class, $video);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
             $entityManager->persist($video);
             $entityManager->flush();
        }

        return $this->render('video/new.html.twig', [
            'form' => $form,
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
    public function showVideo(SluggerInterface $slugger, Video $video): Response
    {
        $slug = $slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);

        return $this->render('video/show.html.twig', [
            'video' => $video,
        ]);
    }
}
