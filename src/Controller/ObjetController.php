<?php

namespace App\Controller;

use App\Repository\ObjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ObjetController extends AbstractController
{
    #[Route('/objet', name: 'app_objet')]
    public function index(ObjetRepository $ObjetRepository): Response
    {
        $objetList = $ObjetRepository->findAll();

        return $this->render('objet/index.html.twig', [
            'objetList' => $objetList,
        ]);
    }

    #[Route('/objet/{id}', name: 'app_show_objet')]
    public function show(int $id, ObjetRepository $ObjetRepository): Response
    {
        $objetDetails = $ObjetRepository->find($id);

        return $this->render('objet/single.html.twig', [
            'objetDetails' => $objetDetails,
        ]);
    }    
}
