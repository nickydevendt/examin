<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

    class Contact extends Controller
    {
        /**
            * @Route("/contact")
            */
        public function Contact() {
            $_SESSION['admin'] = 0;
            $_SESSION['userid'] = 0;

            return $this->render('contact.html.twig', array(
            'session' => $_SESSION,
            ));
        }
    }

