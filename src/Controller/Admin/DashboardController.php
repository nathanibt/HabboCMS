<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use App\Entity\CmsEvenement;
use App\Entity\CmsActualites;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin782127631636136t1231313s", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('BackHabbo');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('News', 'fas fa-list', CmsActualites::class);
        yield MenuItem::linkToCrud('Users', 'fas fa-users', Users::class);
        yield MenuItem::linkToCrud('Evenements', 'fas fa-list', CmsEvenement::class);
    }
}
