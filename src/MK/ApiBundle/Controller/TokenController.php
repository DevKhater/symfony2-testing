<?php

namespace MK\ApiBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;

/**
 * Description of TokenController
 *
 * @author Michel Khater
 */
class TokenController extends Controller
{

    /**
     * @Route("/token", name="new_token")
     * @Method("POST")
     */
    public function newTokenAction(Request $request)
    {
        $user = $this->get('mk.user.provider')->loadUserByUsername($request->getUser());
        if (!$user) {
            throw $this->createNotFoundException('User Not Found Please Register');
        }
        $isValid = $this->get('security.password_encoder')
                ->isPasswordValid($user, $request->getPassword(), $user->getSalt());

        if (!$isValid) {
            throw new BadCredentialsException();
        }
        $token = $this->get('lexik_jwt_authentication.encoder')
                ->encode(['username' => $user->getUsername()]);
        return new JsonResponse(['token' => $token, 'exp' => time() + 3600]);
    }

    /**
     * @Route("/token", name="check_token")
     * @Method("GET")
     */
    public function checkTokenAction(Request $request)
    {
        
        
    }

}
