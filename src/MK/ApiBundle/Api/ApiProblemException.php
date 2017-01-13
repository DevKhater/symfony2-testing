<?php

namespace MK\ApiBundle\Api;

use Symfony\Component\HttpKernel\Exception\HttpException;
use UserBundle\Api\ApiProblem;

class ApiProblemException extends HttpException
{

    private $apiProblem;

    public function __construct(ApiProblem $apiProblem, \Exception $previous = null, array $headers = array(), $code = 0)
    {
        $this->apiProblem = $apiProblem;

        parent::__construct(
                $apiProblem->getStatusCode(), $apiProblem->getTitle(), $previous, $headers, $code
        );
    }

    public function getApiProblem()
    {
        return $this->apiProblem;
    }

}
