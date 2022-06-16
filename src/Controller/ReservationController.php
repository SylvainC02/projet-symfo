<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\ObjetRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    #[Route('/reservation/{id}', name: 'app_reservation')]
    public function index(Request $request, ObjetRepository $objetRepository, ManagerRegistry $managerRegistry, $id): Response
    {
        $reservation = new Reservation();
        $objet = $objetRepository->find($id);
        $user = $this->getUser();

        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reservation->setObjet($objet);
            $reservation->setBorrower($user);

            $objet->setIsAvailable(false);

            $entityManager = $managerRegistry->getManager();
            $entityManager->persist($reservation);
            $entityManager->flush();

            $this->addFlash('success', 'Reservation faite !');
            return $this->redirectToRoute('app_home');
        }

        return $this->renderForm('reservation/index.html.twig', [
            'form' => $form,
        ]);
    }
}
