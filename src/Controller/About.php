<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

    class About extends Controller
    {
        /**
            * @Route("/about")
            */
        public function Workprojects() {
            $_SESSION['admin'] = 0;
            $_SESSION['userid'] = 0;

            return $this->render('about.html.twig', array(
            'session' => $_SESSION,
        ));
        }
    }

