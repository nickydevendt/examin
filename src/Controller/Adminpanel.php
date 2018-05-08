<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

    class Adminpanel extends Controller
    {
        /**
            * @Route("/adminpanel")
            */
        public function Adminpanel() {
            $_SESSION['admin'] = 1;
            $_SESSION['userid'] = 1;

            return $this->render('adminpanel.html.twig', array(
            'session' => $_SESSION,
            ));
        }
    }

