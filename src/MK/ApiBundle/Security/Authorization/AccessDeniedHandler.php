<?php

namespace MK\ApiBundle\Security\Authorization;

use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use MK\ApiBundle\Api\ApiProblem;
use MK\ApiBundle\Factory\ApiResponseFactory;

class AccessDeniedHandler
{

    private $responseFactory;

    public function __construct(ApiResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    public function onAccessDeniedException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();
        while (null !== $exception->getPrevious()) {
            $exception = $exception->getPrevious();
        }
        if ($exception instanceof AccessDeniedException) {
            $message = 'Not Authorized';
            $apiProblem = new ApiProblem($exception->getCode(), $exception->getMessage(), $message);
            $response = $this->responseFactory->createResponse($apiProblem);
            $event->setResponse($response);
        }
    }

}
