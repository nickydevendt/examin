<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class Workprojects extends Controller
{   
    /**
    * @Route("/workprojects")
    */
    public function Workprojects() {
    $_SESSION['admin'] = 1;
    $_SESSION['userid'] = 1;

    return $this->render('workhistory.html.twig', array(
    'session' => $_SESSION,
        ));
    }

}

