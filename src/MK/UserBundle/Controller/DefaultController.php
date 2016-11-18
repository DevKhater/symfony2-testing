<?php

namespace MK\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }
        $user = $this->getUser();
        $userObj = $this->get('mk.user.manager')->loadUserByUsername($user->getUsername());
        //$this->get('mk.user.manager')->makeUserSuperUser($userObj);
        dump($userObj);exit;
        return $this->render('MKUserBundle:Default:index.html.twig');
    }

    public function adminAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_SUPER_ADMIN')) {
            throw $this->createAccessDeniedException();
        }
        $user = $this->getUser();
        $userObj = $this->get('mk.user.manager')->loadUserByUsername($user->getUsername());
        //$this->get('mk.user.manager')->makeUserSuperUser($userObj);
        dump($userObj);exit;
        return $this->render('MKUserBundle:Default:index.html.twig');
    }

}
