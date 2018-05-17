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
            $_SESSION['admin'] = 0;
            $_SESSION['userid'] = 0;

            return $this->render('userpanel.html.twig', array(
            'session' => $_SESSION,
            ));
	}
	// $userid is gonna be used for parameter so that needs to be fixed before query can be used
/*	public function getMyUser($userid) {
		return $this->getDoctrine()->getRepository(Users::class)
			->getMe($userid);
	}
//	$userid will be used to fill up the userid since its the foreign key from users.id
	public function getMyVisitors($userid) {
		return $this->getDoctrine()->getRepository(Visitors::class)
			->getMyVisitors($userid);
    	}*/
    }

