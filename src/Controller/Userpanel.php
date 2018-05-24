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
     * @Route("/userpanel/updateuser")
     * @Security("has_role('ROLE_USER') || has_role('ROLE_ADMIN')")
     */
    public function updateuser() {
        $id = $_POST['id'];
        $entitymanager = $this->getDoctrine()->getManager();
        $user = $entitymanager->getRepository(Users::class)->find($id);

        if(!$user) {
            throw $this->createNotFoundException(
                'Couldnt find user with id '.$id
            );
        }

        $user->setFirstname($_POST['firstname']);
        $user->setPrefix($_POST['prefix']);
        $user->setLastname($_POST['lastname']);
        $user->setCurrentemployer($_POST['currentemployer']);
        $entitymanager->flush();
        return new Response('User updated');
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
        if(!empty($insertid)){
            $date = date_format($newvis->getExpiredate(),"d-m-Y");
            return new Response(
            '<tr>;
            <form method="post" action="">
            <td id="freshinsert">'.$newvis->getRandomid().'</td>
            <td id="freshinsert">'.$newvis->getFirstname().'</td>
            <td id="freshinsert">'.$newvis->getPrefix().'</td>
            <td id="freshinsert">'.$newvis->getLastname().'</td>
            <td id="freshinsert">'.$newvis->getEmail().'</td>
            <td id="freshinsert">' .$date.'</td>
            <td><input class="deletebtn remove" type="button" name="deletevisitor" value="delete" onClick="deleteVisit('.$insertid.');"></td>
            </form>
            </tr>'
            );
        }elseif(!isset($insertid)) {
            return new Response('Nothing inserted try again?');
        }else {
            return new Response('Something went terribly wrong refresh and try again please.');
        }
        } catch(Exception $e) {
            die($e);
        }
    }
    /**
     * @Route("/userpanel/deletevisitor")
     * @Security("has_role('ROLE_USER') || has_role('ROLE_ADMIN')")
     */
    public function deleteVisitor() {
        $id = $_POST['deleteid'];
        if(isset($id)){
        $entitymanager = $this->getDoctrine()->getManager();
        $visitor = $entitymanager->getRepository(Visitors::class)->find($id);

        $entitymanager->remove($visitor);
        $entitymanager->flush();

        return new Response('the visitor with id '.$id.' has been removed from the database.');
        }elseif(!isset($id)) {
            return new Response('Something went wrong please return and try again or sent a message to the admin.');
        }
    }
}

