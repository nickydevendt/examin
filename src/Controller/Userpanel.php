<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Visitors;
use App\Entity\Users;

class Userpanel extends Controller
{
        /**
            * @Route("/userpanel")
            * @Security("has_role('ROLE_USER') || has_role('ROLE_ADMIN')")
            */
    public function Userpanel() {
        include 'panel.js';
        return $this->render('userpanel.html.twig', array(
        'session' => $_SESSION, 'user' => $this->getUser(), 'visitors' => $this->getMyVis(),
        ));
    }

	public function getMyVis() {
        $userid = $this->getUser()->getId();
		return $this->getDoctrine()->getRepository(Visitors::class)
			->getMyVisitors($userid);
    }

    /**
        * @Route("/userpanel/addvisitor")
        * @Security("has_role('ROLE_USER') || has_role('ROLE_ADMIN')")
        */
    public function addVisitor() {
        try{
        $entityManager = $this->getDoctrine()->getManager();

        $newvis = new Visitors();
        $newvis->setRandomid();
        $newvis->setInviteid($_POST['inviterid']);
        $newvis->setFirstname($_POST['firstname']);
        $newvis->setPrefix($_POST['prefix']);
        $newvis->setLastname($_POST['lastname']);
        $newvis->setEmail($_POST['email']);
        $newvis->setDatecreated();
        $newvis->setExpiredate();

        $entityManager->persist($newvis);
        $entityManager->flush();
        $insertid = $newvis->getId();
        if(isset($insertid) && !empty($insertid)){
            $lastVis = $this->getDoctrine()->getRepository(Visitors::class)->getLastVisitor($insertid);
            var_dump($lastVis);
            return new Response(
            '<tr>;
            <form method="post" action="">
            <td id="freshinsert">blarps</td>
            <td id="freshinsert">blarps</td>
            <td id="freshinsert">blarps</td>
            <td id="freshinsert">blarps</td>
            <td id="freshinsert">blarps</td>
            <td id="freshinsert">blarps</td>
            <td><input class="deletebtn remove" type="button" name="deletevisitor" value="delete" onClick="deleteVisit();"></td>
            </form>
            </tr>'
            );
            //return new Response($insertid);
        }else {
            return new Response('Nothing inserted try again?');
        }
        } catch(Exception $e) {
            die($e);
        }
    }
}

