<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use App\Form\CategoryType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/category')]
class CategoryController extends AbstractController
{
    #[Route('/', name: 'app_category')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();

        return $this->render('category/index.html.twig', [
        'categories' => $categories,]);
    }

    #[Route('/title/{slugCategory}', name: 'category_videos')]
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

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/add', name: 'category_add')]
    public function addCategory(
        Request $request,
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger
    ): Response {

        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $slug = $slugger->slug($category->getName());
            $category->setSlugCategory($slug);
            $entityManager->persist($category);
            $entityManager->flush();

            $this->addFlash('success', 'Catégorie ajoutée avec succès.');

            return $this->redirectToRoute('app_category');
        }

        return $this->render('category/add.html.twig', [
            'form' => $form,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/delete/{id}', name: 'category_delete')]
    public function deleteCategory(Category $category, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($category);
        $entityManager->flush();

        $this->addFlash('success', 'Catégorie supprimée avec succès.');

        return $this->redirectToRoute('app_category');
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/edit/{id}', name: 'category_edit')]
    public function editCategory(Category $category, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Catégorie mise à jour avec succès.');

            return $this->redirectToRoute('app_category');
        }

        return $this->render('category/edit.html.twig', [
            'form' => $form,
        ]);
    }
}
