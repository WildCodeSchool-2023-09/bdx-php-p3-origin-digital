<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Repository\VideoRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Video;
use App\Form\SearchVideoType;

class SearchController extends AbstractController
{
    private VideoRepository $videoRepository;

    public function __construct(VideoRepository $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    #[Route('video/search', name: 'app_search', methods: 'post')]
    public function search(Request $request): Response
    {
        dump($request->getPayload()->get("search"));
        dump($request->getPayload()->get('navbar_token'));

        if ($this->isCsrfTokenValid('nav-search', $request->getPayload()->get('navbar_token'))) {
            $search = trim($request->getPayload()->get("search"));
            $search = $request->getPayload()->get("search");
            $videos = $this->videoRepository->FindByName($search);
            if (str_replace(' ', '', $search) === '' || empty($videos)) {
                $this->addFlash('danger', 'Aucun resultats trouvés.');
                return $this->render('video/search.html.twig');
            }
            dump($videos);
            return $this->render('video/search.html.twig', [
                'videos' => $videos
            ]);
        }

        return $this->render('video/search.html.twig', [
       //     'form' => $form->createView(),
        ]);
    }
}
