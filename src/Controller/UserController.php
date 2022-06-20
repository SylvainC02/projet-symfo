<?php

namespace App\Controller;

use App\Entity\Objet;
use App\Form\ObjetType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {

        return $this->render('user/index.html.twig', []);
    }

    #[Route('/user/addObject/', name: 'app_add_item')]
    public function add(Request $request, ManagerRegistry $managerRegistry): Response
    {
        $objet = new Objet;
        $user = $this->getUser();
        $form = $this->createform(ObjetType::class, $objet);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {
            $objet->setOwner($user);
            $objet->setIsAvailable(true);

            $directory = '../public/assets/images/';

            $file = $form['image']->getData();
            dd($file);
            $file->move($directory, $file->getClientOriginalName());

            $entityManager = $managerRegistry->getManager();
            $entityManager->persist($objet);
            $entityManager->flush();

            $this->addFlash('success', 'Votre objet a été enregistré !');
            return $this->redirectToRoute('app_user');
        }

        return $this->renderForm('user/addObject.html.twig', ["form" => $form]);
    }
}
