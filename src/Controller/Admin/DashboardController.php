<?php

namespace App\Controller\Admin;
use App\Entity\Category;
use App\Entity\Objet;
use App\Entity\Reservation;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
        #[Route('/admin', name: 'admin')]
        public function index(): Response
        {
                //return parent::index();
                $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);

                // Option 1. Make your dashboard redirect to the same page for all users
                return $this->redirect($adminUrlGenerator->setController(ObjetCrudController::class)->generateUrl());
        }

        public function configureDashboard(): Dashboard
        {
                return Dashboard::new()
                        ->setTitle('Projet Symfo');
        }

        public function configureMenuItems(): iterable
        {
                yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
                yield MenuItem::linkToCrud('Categories', 'fas fa-list', Category::class);
                yield MenuItem::linkToCrud('Objets', 'fas fa-list', Objet::class);
                yield MenuItem::linkToCrud('Reservations', 'fas fa-list', Reservation::class);
                yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);
        }
}
