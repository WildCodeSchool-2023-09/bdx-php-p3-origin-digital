<?php

namespace App\Controller;

use App\Entity\Page;
use App\Entity\PageSection;
use App\Entity\Section;
use App\Entity\Type;
use App\Form\GlobalFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GlobalFormController extends AbstractController
{
    #[Route('/global-form', name: 'global_form')]
    public function globalForm(Request $request, EntityManagerInterface $entityManager): Response
    {

        $page = new Page();
        $section = new Section();
        $type = new Type();
        $pageSection = new PageSection();

        $form = $this->createForm(GlobalFormType::class, [
            'page' => $page,
            'section' => $section,
            'type' => $type,
            'pageSection' => $pageSection,
        ]);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $entityManager->persist($data['page']);
            $entityManager->persist($data['section']);
            $entityManager->persist($data['type']);
            $entityManager->persist($data['pageSection']);

            $entityManager->flush();


            $this->addFlash('success', 'Les informations ont été enregistrées avec succès');
            return $this->redirectToRoute('index.html.twig');
        }

        return $this->render('form/global_form.html.twig', [
            'globalForm' => $form->createView(),
        ]);
    }
}
