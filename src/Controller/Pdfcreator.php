<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Visitors;
use App\Entity\Users;

class Pdfcreator extends Controller
{
    /**
    * @Route("/letscreate")
    * @Security("has_role('ROLE_USER') || has_role('ROLE_VISITOR') || has_role('ROLE_ADMIN')")
    */
    public function CreatePage() {
        return $this->render('resumecreator.html.twig', array(
        'session' => $_SESSION, 'user' => $this->getUser(),
        ));
    }
// you can put here another public function to use inside the controller or make other functions with routing so it can be called
    /**
     * @Route("/letscreate/building")
     *  @Security("has_role('ROLE_USER') || has_role('ROLE_ADMIN') || has_role('ROLE_VISITOR')")
     */
    public function buildpdf() {
        var_dump('??');
    }
}

