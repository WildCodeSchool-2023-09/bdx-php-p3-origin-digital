<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'app_category')]
    public function index(): Response
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }

    #[Route('/category/{slugCategory}', name: 'category_videos')]
    public function categoryVideos(string $slugCategory, CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findOneBy(['slugCategory' => $slugCategory]);

        if (!$category) {
            throw $this->createNotFoundException('Catégorie non trouvée');
        }

        return $this->render('category/videos.html.twig', [
            'category' => $category,
            'videos' => $category->getVideo(),
        ]);
    }
}
