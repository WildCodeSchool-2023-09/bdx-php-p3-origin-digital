<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Page;
use App\Entity\PageSection;
use App\Entity\Section;
use App\Entity\Type;
use App\Entity\Video;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(VideoCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Bdx Php P3 Origin Digital');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Video', 'fas fa-video', Video::class);
        yield MenuItem::linkToCrud('Category', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('Section', 'fas fa-section', Section::class);
        yield MenuItem::linkToCrud('Page', 'fas fa-file-video', Page::class);
    }
}
