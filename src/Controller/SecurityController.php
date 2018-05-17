<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;

class SecurityController extends Controller
{
    /**
        * @Route("/login", name="login")
        */
    public function loginAction(Request $request)
    {
	$session = $request->getSession();

	if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)){
		$error = $request->attributes->get(
			SecurityContextInterface::AUTHENTICATION_ERROR
		);
	}elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
		$error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
		$session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
	}else {
		$error = null;
	}

	$lastUsername = (null === $session) ? '' : $session->get(SecurityContextInterface::LAST_USERNAME);

	return $this->render(
		'reglog.html.index',
		array(
			'last_username' => $lastUsername,
			'error'		=> $error,
		)
	);
    }

    /**
        * @Route("/login_check", name="login_check")
        */
    public function loginCheckAction()
    {

    }

    /**
        * @Route("/logout", name="logout")
        */
    public function logoutAction()
    {

    }
}

