<?php

namespace App\Controller;

use App\Entity\Objet;
use App\Form\ObjetType;
use App\Repository\ObjetRepository;
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
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $file->guessExtension();

                try {
                    $file->move(
                        $this->getParameter('objet_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
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

    #[Route('/user/myobjects/', name: 'app_my_items')]
    public function showMyItems(ObjetRepository $objetRepository): Response
    {
        $user = $this->getUser();
        $id = $user->getId();
        $objets = $objetRepository->findBy([
            "owner" => $id
        ]);

        return $this->render('user/myobjects.html.twig', [
            "objets" => $objets
        ]);
    }

    #[Route('/user/deleteObject/{id}', name: 'del_my_item')]
    public function deleteItems(ManagerRegistry $managerRegistry, ObjetRepository $objetRepository, $id): Response
    {
        $objet = $objetRepository->find($id);
        $entityManager = $managerRegistry->getManager();
        $entityManager->remove($objet);
        $entityManager->flush();

        $this->addFlash('success', 'Objet supprimé !');
        return $this->redirectToRoute('app_my_items');
    }

    #[Route('/user/editObject/{id}', name: 'edit_my_item')]
    public function editItem(ObjetRepository $objetRepository, Request $request,  ManagerRegistry $managerRegistry, $id, SluggerInterface $slugger): Response
    {
        $item = $objetRepository->find($id);
        $user = $this->getUser();
        $form = $this->createform(ObjetType::class, $item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $item->isIsAvailable();
            $item->setOwner($user);

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
                    // ... handle exception if something happens during file upload
                }
                $item->setImage($newFilename);
            }

            $entityManager = $managerRegistry->getManager();
            $entityManager->persist($item);
            $entityManager->flush();

            $this->addFlash('success', 'Votre objet a été modifié !');
            return $this->redirectToRoute('app_my_items');
        }
        return $this->renderForm('user/editObject.html.twig', [
            "form" => $form,
            "objet" => $item
        ]);
    }
}
