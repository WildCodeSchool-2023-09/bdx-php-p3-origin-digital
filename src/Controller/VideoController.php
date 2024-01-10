<?php

namespace App\Controller;

use App\Form\VideoType;
use App\Repository\VideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use App\Entity\Video;
use Doctrine\DBAL\Types\DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/video', name: '')]
class VideoController extends AbstractController
{
    #[Route('/', name: 'app_video')]
    public function index(VideoRepository $videoRepository): Response
    {
        $videos = $videoRepository->findAll();

        return $this->render('video/index.html.twig', [
            'videos' => $videos,
        ]);
    }

    #[Route('/new', name: 'upload_video')]
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $video = new Video();
        $form = $this->createForm(VideoType::class, $video);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $videoFile = $form->get('file')->getData();
            $imageFile = $form->get('image')->getData();
            $video->setDatetime(new \DateTimeImmutable());

            $slug = $slugger->slug($video->getTitle());
            $video->setSlugVideo($slug);
            if ($videoFile) {
                $originalVideoName = pathinfo($videoFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeVideoName = $slugger->slug($originalVideoName);
                $newVideoName = $safeVideoName . '-' . uniqid() . '.' . $videoFile->guessExtension();
                $videoFile->move(dirname(__DIR__, 2) . '/assets/images', $newVideoName);
                $video->setFile($newVideoName);
            }

            if ($imageFile) {
                $originImageName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeImageName = $slugger->slug($originImageName);
                $newImageName = $safeImageName . '-' . uniqid() . '-' . $imageFile->guessExtension();
                $imageFile->move(dirname(__DIR__, 2) . '/assets/images', $newImageName);
                $video->setImage($newImageName);
            }
            $entityManager->persist($video);
            $entityManager->flush();
        }
        return $this->render('video/upload.html.twig', [
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
