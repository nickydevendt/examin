<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Users;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

    class Reglog extends Controller
    {
        /**
            * @Route("/reglog")
            */
        public function Reglog() {
            return $this->render('reglog.html.twig');
        }

        /**
            * @route("/register")
            */
        public function registration(UserPasswordEncoderInterface $encoder) {
            $entityManager = $this->getDoctrine()->getManager();
            $salt = 15;
            $user = new Users();
            $user->setFirstname($_POST['firstname']);
            $user->setPrefix($_POST['prefix']);
            $user->setLastname($_POST['lastname']);
            $user->setEmail($_POST['email']);
            $user->setcurrentemployer($_POST['currentemployer']);
            $user->setUsername($_POST['username']);
            $user->setRoles('ROLE_USER');
 
            $plainPassword = $_POST['password'];
            $encoded = $encoder->encodePassword($user, $plainPassword);
            $user->setPassword($encoded);

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->render('reglog.html.twig');
            }
        /**
        * @route("/logintrue")
        */
        public function login($username, $password) {
        }
    }

