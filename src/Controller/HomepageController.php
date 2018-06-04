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
            $data = array(
                'companies' => $this->getAllCompanys(), 'projects' => $this->getAllProjects(),'user' => $this->getUser(),
            );
            return $this->render('page.html.twig', $data);
        }

        public function getAllCompanys() {
            return $this->getDoctrine()->getRepository(Affiliatedcompanys::class)
                ->findThreeCompanys();
        }

        public function getAllProjects() {
        return $this->getDoctrine()
		    ->getRepository(projects::class)
		    ->findThreeProjects();
        }
    }

