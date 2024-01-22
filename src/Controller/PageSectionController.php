<?php

namespace App\Controller;

use App\Entity\PageSection;
use App\Form\PageSectionType;
use App\Repository\PageSectionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/page/section')]
class PageSectionController extends AbstractController
{
    #[Route('/', name: 'app_page_section_index', methods: ['GET'])]
    public function index(PageSectionRepository $pSectionRepository): Response
    {
        return $this->render('page_section/index.html.twig', [
            'page_sections' => $pSectionRepository->findAll(),

        ]);
    }

    #[Route('/new', name: 'app_page_section_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $pageSection = new PageSection();
        $form = $this->createForm(PageSectionType::class, $pageSection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($pageSection);
            $entityManager->flush();

            return $this->redirectToRoute('app_page_section_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('page_section/new.html.twig', [
            'page_section' => $pageSection,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_page_section_show', methods: ['GET'])]
    public function show(PageSection $pageSection): Response
    {
        return $this->render('page_section/show.html.twig', [
            'page_section' => $pageSection,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_page_section_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PageSection $pageSection, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PageSectionType::class, $pageSection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_page_section_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('page_section/edit.html.twig', [
            'page_section' => $pageSection,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_page_section_delete', methods: ['POST'])]
    public function delete(Request $request, PageSection $pageSection, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $pageSection->getId(), $request->request->get('_token'))) {
            $entityManager->remove($pageSection);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_page_section_index', [], Response::HTTP_SEE_OTHER);
    }
}
