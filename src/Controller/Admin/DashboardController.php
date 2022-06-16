<?php

namespace App\Controller\Admin;
<<<<<<< HEAD
=======

>>>>>>> 8a1df17a15f9ea6366a4b127000b39ba9f93c067
use App\Entity\Category;
use App\Entity\Objet;
use App\Entity\Reservation;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
<<<<<<< HEAD
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        //  Option 1. You can make your dashboard redirect to some common page of your backend
        
         $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
         return $this->redirect($adminUrlGenerator->setController(ObjetCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
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
        yield MenuItem::linkToCrud('Reservations', 'fas fa-pager', Reservation::class);
        yield MenuItem::linkToCrud('Users', 'fas fa-user', User::class);
    }
=======
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
>>>>>>> 8a1df17a15f9ea6366a4b127000b39ba9f93c067
}
