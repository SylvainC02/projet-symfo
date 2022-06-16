<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use COM;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CategoryRepository $categorieRepository): Response
    {
        $categories = $categorieRepository->findAll();

        return $this->render('home/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route('/categorie/{id}', name: 'single_home')]
    public function single(CategoryRepository $categorieRepository, $id): Response
    {
        $categorie = $categorieRepository->find($id);

        return $this->render('home/single.html.twig', [
            'categorie' => $categorie,
        ]);
    }
}
