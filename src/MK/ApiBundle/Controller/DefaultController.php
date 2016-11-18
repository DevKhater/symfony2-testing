<?php

namespace MK\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use MK\ApiBundle\Api\ApiProblem;

class DefaultController extends Controller
{

    /**
     * @Route("/")
     * @Method("GET")
     */
    public function indexAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->get('mk.api.response_factory')->createResponse(new ApiProblem(401, 'unAuth', 'You Must Login'));
        }
        return $this->render('MKApiBundle:Default:index.html.twig');
    }

    /**
     * @Route("/post")
     * @Method("GET")
     */
    public function testAPiPOSTAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')) {
            return $this->get('mk.api.response_factory')->createResponse(new ApiProblem(401, 'unAuth', 'Not Authorized Only Super Admin'));
        }
        return new JsonResponse('TheData Fr USER');
    }
}
