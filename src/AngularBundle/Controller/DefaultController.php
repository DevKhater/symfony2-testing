<?php

namespace AngularBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="ng_login")
     */
    public function indexAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->render('AngularBundle:Default:index.html.twig', ['loggedIn' => 0]);
        }
        return $this->render('AngularBundle:Default:index.html.twig', ['loggedIn' => 1]);
    }
    
    /**
     * @Route("/getUser", name="ng_get_user")
     */
    public function getUserAction()
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $user = $this->getUser()->getUsername();
            return new JsonResponse($user, 200);
        }
    }
}
