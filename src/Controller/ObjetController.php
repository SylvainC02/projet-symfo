<?php

namespace App\Controller;

use App\Repository\ObjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ObjetController extends AbstractController
{
    #[Route('/objet', name: 'app_objet')]
    public function index(ObjetRepository $objetRepository): Response
    {
        $objets = $objetRepository->findAll();
        return $this->render('objet/index.html.twig', [
            'objets' => $objets
        ]);
    }

    #[Route('/objet/{id}', name: 'objet')]
    public function single(ObjetRepository $objetRepository, $id): Response
    {
        $objet = $objetRepository->find($id);
        return $this->render('objet/single.html.twig', [
            'objet' => $objet

        ]);
    }

   
}
