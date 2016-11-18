<?php

namespace MK\ApiBundle\Factory;

use Symfony\Component\HttpFoundation\JsonResponse;
use MK\ApiBundle\Api\ApiProblem;

class ApiResponseFactory
{
    public function createResponse(ApiProblem $apiProblem)
    {
        $data = $apiProblem->toArray();
        // making type a URL, to a temporarily fake page
//        if ($data['type'] != null) {
//            $data['type'] = 'http://localhost:8000/docs/errors#'.$data['type'];
//        }

        $response = new JsonResponse(
            $data,
            $apiProblem->getStatusCode()
        );
        $response->headers->set('Content-Type', 'application/problem+json');
        return $response;
    }
}
