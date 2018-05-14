<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Users;
use App\Entity\Projects;
use App\Entity\Affiliatedcompanys;
use App\Entity\Visitors;

    class HomepageController extends Controller
    {
        /**
            * @Route("/")
            */
        public function homepage() {
            $_SESSION['admin'] = 1;
            $_SESSION['userid'] = 1;

            return $this->render('page.html.twig', array(
                'session' => $_SESSION, 'companys' => $this->getAllCompanys(), 'projects' => $this->getAllProjects(),
            ));
        }

        public function getAllCompanys() {
            $affiliatedcompanys = $this->getDoctrine()
                ->getRepository(affiliatedcompanys::class)
                ->findAll();
            return $affiliatedcompanys;
        }
        public function getAllProjects() {
            $projects = $this->getDoctrine()
                ->getRepository(projects::class)
                ->findAll();
            return $projects;
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

            return new Response('Saved new standard user with id '.$user->getId());
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

            return new Response('saved new test project with id '.$project->getId());
        }
        /**
            * @route("/addaff")
            */
        public function addAffiliatedcompanys() {
            $entityManager = $this->getDoctrine()->getManager();

            $addcoms = new Affiliatedcompanys();
            $addcoms->setName('nicky');
            $addcoms->setWebsite("www.hema.nl");
            $addcoms->setDatecreated();

            $entityManager->persist($addcoms);
            $entityManager->flush();

            return new Response('saved new company with id '.$addcoms->getId());
        }
        /**
            * @route("/addvis")
            */
        public function addVisitors() {
            $entityManager = $this->getDoctrine()->getManager();

            $newvis = new Visitors();
            $newvis->setRandomid();
            $newvis->setInviteid('1');
            $newvis->setFirstname("nicky");
            $newvis->setPrefix("de");
            $newvis->setLastname("vendt");
            $newvis->setEmail("nickyisdebeste@hotmail.com");
            $newvis->setDatecreated();
            $newvis->setExpiredate();

            $entityManager->persist($newvis);
            $entityManager->flush();
            return new Response('saved new visitor with id '.$newvis->getId());
        }
    }

