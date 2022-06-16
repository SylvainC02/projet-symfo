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
        $listObjet = $objetRepository->findAll();

        return $this->render('objet/index.html.twig', [
            "listObjets" => $listObjet
        ]);
    }

    #[Route('/objet/{id}', name: 'app_single_objet')]
    public function show(ObjetRepository $objetRepository, $id): Response
    {
        $objet = $objetRepository->findOneBy([
            'id' => $id
        ]);

        return $this->render('objet/single.html.twig', [
            "objet" => $objet
        ]);
    }
}
