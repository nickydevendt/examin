<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\AbstractController;
use Symfony\Component\HttpFoundation\Response;

    class HomepageController extends AbstractController
    {
        /**
            * @Route("/")
            */
        public function homepage() {
            return $this->render('index.html.twig', array());
        }
    }

