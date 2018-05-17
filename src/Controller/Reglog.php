<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Users;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;

    class Reglog extends Controller
    {
        /**
            * @Route("/reglog")
            */
        public function Reglog() {
            $_SESSION['admin'] = 0;
            $_SESSION['userid'] = 0;

            return $this->render('reglog.html.twig', array(
            'session' => $_SESSION,
            ));
        }

        /**
            * @route("/reglog/register")
            */
        public function registration(request $request) {
            $user = new User();
            $form = $this->createForm(Users::class, $user);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $enoder = $this->get('security.password_encoder');
                $password = $encoder->encodePassword($user, $user->getPlainPassword());
                $user->setPassword($password);

                $user->setRole('ROLE_USER');

                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                return $this->redirectToRoute('reglog');
            }

            return $this->render('reglog.html.twig', [
                'form' => $form->createView(),
            ]);
        }
    }

