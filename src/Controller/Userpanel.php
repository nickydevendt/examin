<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

    class Userpanel extends Controller
    {
        /**
            * @Route("/userpanel")
            */
        public function Userpanel() {
            $_SESSION['admin'] = 1;
            $_SESSION['userid'] = 1;

            return $this->render('userpanel.html.twig', array(
            'session' => $_SESSION,
            ));
        }

    }   

