<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use App\Entity\Users;
use App\Entity\Visitors;

    class Adminpanel extends Controller
    {
        /**
            * @Route("/adminpanel")
            * @Security("has_role('ROLE_ADMIN')")
            */
        public function Adminpanel() {
            return $this->render('adminpanel.html.twig', array(
            'session' => $_SESSION, 'users' => $this->getAllUsers(), 'visitors' => $this->getAllVisitors(),
            ));
            }
            public function getAllUsers() {
//                return $this->getDoctrine()->getRepository(Users::class)->findAllUsers();
                return $this->getDoctrine()
                    ->getRepository(Users::class)
                    ->findAll();
            }
            public function getAllVisitors() {
                //return $this->getDoctrine()->getRepository(Visitors::class)->findAllVisitors();
                return $this->getDoctrine()
                    ->getRepository(Visitors::class)
                    ->findAll();
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

