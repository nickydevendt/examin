<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

    class Reglog extends Controller
    {
        /**
            * @Route("/login")
            */
        public function Reglog() {
            $_SESSION['admin'] = 1;
            $_SESSION['userid'] = 1;

            return $this->render('reglog.html.twig', array(
            'session' => $_SESSION,
        ));
    }

    }   


