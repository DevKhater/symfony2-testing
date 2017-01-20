<?php

namespace DataBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Hateoas\Representation\PaginatedRepresentation;
use Hateoas\Representation\CollectionRepresentation;


class BaseApiController extends FOSRestController {

    var $classEntity, $serviceEntity, $templateDirectory;

    public function getList(Request $request, ParamFetcherInterface $paramFetcher, $toalEntities) {
            $offset = null == $paramFetcher->get('offset') ? 1 : $paramFetcher->get('offset');
            $limit = $paramFetcher->get('all') == 1 ? $toalEntities : $paramFetcher->get('limit');
            $maxPages = ceil($toalEntities / $limit);
            $data = $this->container->get($this->serviceEntity)->all($offset, $limit);
            return [$data, $offset, $limit, $maxPages];
    }

    public function showAction($id) {
        $data = $this->getOr404($id);
        $view = $this->view($data, 200);
        return $this->handleView($view);
    }

    public function deleteAction($id) {
        $entity = $this->getOr404($id);
        $this->container->get($this->serviceEntity)->delete($entity);
        $view = $this->view(null, 204);
        return $this->handleView($view);
    }

    public function getOr404($id) {
        if (!($entity = $this->container->get($this->serviceEntity)->get($id))) {
            throw new NotFoundHttpException($this->classEntity . ' Not Found');
        }
        return $entity;
    }

    public function createPaginations($data, $relName, $apiUrl, $offset, $limit, $maxPages, $totalData ) {
        return new PaginatedRepresentation(
                new CollectionRepresentation($data, $relName, $relName), $apiUrl, array(), $offset, $limit, $maxPages, 
                'page', 'limit', false, $totalData);
        }
    }
