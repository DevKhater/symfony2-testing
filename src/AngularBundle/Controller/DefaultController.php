<?php

namespace AngularBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use MK\ApiBundle\Api\ApiProblem;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="backend_login")
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
    public function getUserAction(Request $request)
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $user = $this->getUser()->getUsername();
            return new JsonResponse($user, 200);
        } else {
            $problem = new ApiProblem(400, 'authentication','User Not Loged In');
            return $this->container->get('mk.api.response_factory')->createResponse($problem); 
        }
    }

}
