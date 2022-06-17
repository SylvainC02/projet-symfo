<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\ObjetRepository;
<<<<<<< HEAD
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    #[Route('/reservation/{id}','/reservation', name: 'app_reservation')]
    public function index($id, Request $request, ObjetRepository $objetRepository,ManagerRegistry $managerRegistry): Response
    {
        $reservation = new Reservation();
        $objet= $objetRepository->find($id);
        $user= $this->getUser();
        $form= $this->createForm(ReservationType::class,$reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           $reservation->setObjet($objet);
           $reservation->setborrower($user);
           $objet->setIsAvailable(false);
           $entityManager= $managerRegistry->getManager();
           $entityManager->persist($reservation);
           $entityManager->flush();
           $this->addFlash('success', 'votre resrvation a bien été confirmée');
           return $this->redirectToRoute('app_home');

        }
;        return $this->renderForm('reservation/index.html.twig', [
=======
use App\Repository\ReservationRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ReservationController extends AbstractController
{
    #[Route('/reservation/{id}', name: 'app_reservation')]
    public function index(Request $request, $id, ObjetRepository $objetRepository, ManagerRegistry $managerRegistry): Response
    {
        $reservation = new Reservation();
        $objet = $objetRepository->find($id);
        $user = $this->getUser();
        $form = $this->createform(ReservationType::class, $reservation);
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
>>>>>>> 7fbbe1eab58f3aada36c7945795b715a13da3af8
            'form' => $form,
        ]);
    }
}
