<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class Workprojects extends Controller
{   
    /**
    * @Route("/workprojects")
    * @Security("has_role('ROLE_USER') || has_role('ROLE_ADMIN') || has_role('ROLE_VISITOR')")
    */
    public function Workprojects() {
    $_SESSION['admin'] = 0;
    $_SESSION['userid'] = 0;

    return $this->render('workhistory.html.twig', array(
    'session' => $_SESSION,
        ));
    }

}

