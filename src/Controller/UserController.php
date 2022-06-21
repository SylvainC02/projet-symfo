<?php

namespace App\Controller;

use App\Entity\Objet;
use App\Form\ObjetType;
use App\Form\RegistrationFormType;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;


class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        $id = $this->getUser()->getId();
        return $this->render('user/index.html.twig', ['numero' => $id]);
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

                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $file->guessExtension();


                try {
                    $file->move(
                        $this->getParameter('objet_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }


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

    #[Route('/user/mesInfos/', name: 'app_infos')]
    public function mesInfos(): Response
    {
        $user = $this->getUser();
        return $this->render('user/mesInfos.html.twig', ['user' => $user]);
    }

    #[Route('/user/mesInfos/edit/{id}', name: 'app_edit_infos')]
    public function editInfos(Request $request, ManagerRegistry $managerRegistry, User $user)
    {
        $form = $this->createform(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $entityManager = $managerRegistry->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Vos infos ont bien été modifiée !');
            return $this->redirectToRoute('app_infos');
        }

        return $this->renderForm('user/editInfos.html.twig', ["form" => $form, "user" => $user]);
    }
}
