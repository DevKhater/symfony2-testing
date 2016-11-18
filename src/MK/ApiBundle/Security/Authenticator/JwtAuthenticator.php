<?php

namespace MK\ApiBundle\Security\Authenticator;

use Doctrine\ORM\EntityManager;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\AuthorizationHeaderTokenExtractor;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;
use MK\ApiBundle\Api\ApiProblem;
use MK\ApiBundle\Factory\ApiResponseFactory;

class JwtAuthenticator extends AbstractGuardAuthenticator
{

    private $em;
    private $jwtEncoder;
    private $responseFactory;

    public function __construct(EntityManager $em, JWTEncoderInterface $jwt, ApiResponseFactory $responseFactory)
    {
        $this->em = $em;
        $this->jwtEncoder = $jwt;
        $this->responseFactory = $responseFactory;
    }

    public function getCredentials(Request $request)
    {
        $extractor = new AuthorizationHeaderTokenExtractor('Bearer', 'Authorization');
        $token = $extractor->extract($request);
        if (false == $token) {
            return;
        }
        return $token;
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $data = $this->jwtEncoder->decode($credentials);
        if (!$data) {
            throw new CustomUserMessageAuthenticationException('Invalid Token');
            ;
        }
        $username = $data['username'];
        return $this->em->getRepository('MKUserBundle:User')->findOneBy(['username' => $username]);
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        return true;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $apiProblem = new ApiProblem(401);
        $apiProblem->set('detail', $exception->getMessageKey());
        return $this->responseFactory->createResponse($apiProblem);
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        return;
    }

    public function supportsRememberMe()
    {
        return false;
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
//        return new JsonResponse(
//                // you could translate the message
//                array('message' => 'Authentication required'), 401
//        );
        $apiProblem = new ApiProblem(401);
        $message = $authException ? $authException->getMessageKey() : 'Missing credentials';
        $apiProblem->set('detail', $message);
        return $this->responseFactory->createResponse($apiProblem);
    }

}
