<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

    class About extends Controller
    {
        /**
            * @Route("/about")
            * @Security("has_role('ROLE_USER') || has_role('ROLE_ADMIN') || has_role('ROLE_VISITOR')")
            */
        public function About() {
            return $this->render('about.html.twig', array(
            'session' => $_SESSION,
        ));
        }
    }

