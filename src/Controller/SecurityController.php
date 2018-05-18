<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{


    /**
        * @Route("/login_check", name="login_check")
        */
    public function login(Request $request, AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();

        $lastUsername = $authUtils->getLastUsername();

        return $this->render('reglog.html.twig', array(
            'session' => $_SESSION,
            'last_username' => $lastUsername,
            'error' => $error,
        ));
    }
    /**
        * @Route("/login", name="login")
        */
    public function logged(EntityManagerInterface $em, Request $request, AuthenticationUtils $authUtils)
    {
        error_log(".OMG.");
        return $this->render('reglog.html.twig', array('session' => $_SESSION));
    }
    /**
        * @Route("/logout", name="logout")
        */
    public function logoutAction()
    {

    }
}

