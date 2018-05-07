<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

    class HomepageController extends Controller
    {
        /**
            * @Route("/")
            */
        public function homepage() {
            $number = mt_rand(0,100);
            return $this->render('index.html.twig', array(
                'number' => $number
            ));
        }
    }

