<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

    class Adminpanel extends Controller
    {
        /**
            * @Route("/adminpanel")
            * @Security("has_role('ROLE_ADMIN')")
            */
        public function Adminpanel() {
            $_SESSION['admin'] = 1;
            $_SESSION['userid'] = 1;

            return $this->render('adminpanel.html.twig', array(
            'session' => $_SESSION,
            ));
	}
// $userid is gonna be used for parameter so that needs to be fixed before query can be used
/*      public function getAllUsers() {
		return $this->getDoctrine()->getRepository(Users::class)
			->findAllUsers();
	}

//      $userid will be used to fill up the userid since its the foreign key from users.id
	public function GetAllVisitors() {
		return $this->getDoctrine()->getRepository(Visitors::class)
			->findAllVisitors();
		}*/
    }

