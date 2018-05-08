<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

    class Resume extends Controller
    {
        /**
        * @Route("/resume")
        */
        public function Resume() {
            $_SESSION['admin'] = 1;
            $_SESSION['userid'] = 1;

            return $this->render('resume.html.twig', array(
            'session' => $_SESSION,
            ));
        }
    }

