<?php

namespace MK\ApiBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

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
            return $this->get('mk.api.response_factory')->createResponse(new ApiProblem(404, 'Not Found', 'Username Not Found'));
        }
        $isValid = $this->get('security.password_encoder')
                ->isPasswordValid($user, $request->getPassword(), $user->getSalt());

        if (!$isValid) {
            return $this->get('mk.api.response_factory')->createResponse(new ApiProblem(401, 'unAuth', 'Invalid credentials'));
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
