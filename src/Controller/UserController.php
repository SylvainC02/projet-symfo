<?php

namespace App\Controller;

use App\Entity\Objet;
use App\Form\ObjetType;
use App\Repository\ReservationRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {

        return $this->render('user/index.html.twig', []);
    }

    #[Route('/user/addObject/', name: 'app_add_item')]
    public function add(Request $request, ManagerRegistry $managerRegistry, SluggerInterface $slugger): Response
    {
        $objet = new Objet;
        $user = $this->getUser();
        $form = $this->createform(ObjetType::class, $objet);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {
            $objet->setOwner($user);
            $objet->setIsAvailable(true);

        

            $file = $form['image']->getData();

            if ($file) {
                $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $file->move(
                        $this->getParameter('objet_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $objet->setImage($newFilename);
            }


            $entityManager = $managerRegistry->getManager();
            $entityManager->persist($objet);
            $entityManager->flush();

            $this->addFlash('success', 'Votre objet a été enregistré !');
            return $this->redirectToRoute('app_user');
        }

        return $this->renderForm('user/addObject.html.twig', ["form" => $form]);
    }

    #[Route('/user/myReservations/', name: 'app_show_reservation')]
    public function showMyres(ReservationRepository $reservationRepository) : Response{

        $user = $this->getUser();
        $id = $user->getId();
        $reservations = $reservationRepository->findby([
            "borrower"=>$id
        ]);

        return $this->render('user/myReservations.html.twig', [
            'reservations'=>$reservations
        ]);   

    }

    #[Route('/user/myReservations/delete/{id}', name: 'app_delete_reservation')]
    public function deleteMyRes(ManagerRegistry $managerRegistry, ReservationRepository $reservationRepository, $id): Response{
        $reservation= $reservationRepository->find($id);
        
        
        $entityManager = $managerRegistry->getManager();
        $entityManager->remove($reservation);
        $entityManager->flush();

        $this->addFlash('success', 'Votre Reservation a été supprimée !');
        return $this->redirectToRoute('app_show_reservation');

    }
}
