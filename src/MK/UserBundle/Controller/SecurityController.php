<?php

namespace MK\UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{

    /**
     * @Route("/login", name="secure_login")
     */
    public function loginAction()
    {
        return $this->render('MKUserBundle:Security:login.html.twig');
    }

    /**
     * 
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction(Request $request)
    {
        
    }
}
