<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Users;
use App\Entity\Projects;
use App\Entity\Affiliatedcompanys;

    class HomepageController extends Controller
    {
        /**
            * @Route("/")
            */
        public function homepage() {
            $_SESSION['admin'] = 1;
            $_SESSION['userid'] = 1;

            return $this->render('page.html.twig', array(
                'session' => $_SESSION, 'companys' => '3', 'projects' => '3',
            ));
        }
        /**
            * @route("/addusers")
            */
        public function addUser() {
            $entityManager = $this->getDoctrine()->getManager();

            $user = new Users();
            $user->setFirstname('Nicky');
            $user->setPrefix('nicky');
            $user->setLastname("www.hema.nl");
            $user->setEmail("blarps");
            $user->setcurrentemployer("blarps");
            $user->setUsername("blarps");
            $user->setPassword("blarps");
            $user->setAdmin(1);
            $user->setLastname("www.hema.nl");

            $entityManager->persist($user);
            $entityManager->flush();

            return new Response('Saved new product with id '.$user->getId());
        }
         /**
            * @route("/addproject")
            */
        public function addProjects() {
            $entityManager = $this->getDoctrine()->getManager();

            $project = new Projects();
            $project->setDeveloper('nicky');
            $project->setName('nicky');
            $project->setCompanyname('hema');
            $project->setCompanywebsite('www.hema.nl');

            $entityManager->persist($project);
            $entityManager->flush();

            return new Response('saved new project with id '.$project->getId());
        }
        /**
            * @route("/addaffiliatedcompanys")
            */
        public function addAffiliatedcompanys() {
            $entityManager = $this->getDoctrine()->getManager();

            $addcoms = new Affiliatedcompanys();
            $addcoms->setName('nicky');
            $addcoms->setWebsite("www.hema.nl");

            $entityManager->persist($addcoms);
            $entityManager->flush();

            return new Response('saved new company with id '.$addcoms->getId());
        }
/*
        function getCompanys() : array {
            $stmt = $pdo->prepare('SELECT * FROM affiliatedcompanys ORDER BY datecreated ASC LIMIT 5');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        function getProjects() : array {
            $statement = connection()->prepare('SELECT * FROM projects ORDER BY id DESC LIMIT 3');
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        function connection() {
            $pdo = new PDO('pgsql:host=localhost;dbname=nicky;', 'nicky', 'blarps');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }*/
    }

