<?php

namespace App\Controller;
<<<<<<< HEAD
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
=======

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
>>>>>>> 8a1df17a15f9ea6366a4b127000b39ba9f93c067

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
<<<<<<< HEAD
    // public function index(): Response
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
          // get the login error if there is one
         $error = $authenticationUtils->getLastAuthenticationError();

             // last username entered by the user
         $lastUsername = $authenticationUtils->getLastUsername();
         
         return $this->render('login/index.html.twig', [
            // 'controller_name' => 'LoginController',
            'last_username' => $lastUsername,
                         'error'         => $error,
=======
    public function index(AuthenticationUtils $authenticationUtils): Response
    {

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login/index.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
>>>>>>> 8a1df17a15f9ea6366a4b127000b39ba9f93c067
        ]);
    }
}
