<?php

namespace DataBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;
use Hateoas\Representation\PaginatedRepresentation;
use Hateoas\Representation\CollectionRepresentation;

class ApiMediaController extends FOSRestController
{

    public function __construct()
    {
        $this->classEntity = 'DataBundle:Media';
        $this->serviceEntity = 'data.media.handler';
        $this->templateDirectory = 'DataBundle:Concert:';
    }

    /**
     * @Route("api/media", name="api_media_list")
     * @Method("GET")
     * @ApiDoc(
     *   description="List All Images",
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when Successful",
     *     404 = "Returned when No Content Found",
     *   }
     * )
     *
     * @Annotations\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing bands.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="10", description="How many bands to return.")
     *
     * @Annotations\View(templateVar="media")
     */
    public function getMediaAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $offset = null == $paramFetcher->get('offset') ? 1 : $paramFetcher->get('offset');
        $totalImages = $this->getDoctrine()->getRepository($this->classEntity)->countAllEntities();
        $limit = $paramFetcher->get('limit');
        $maxPages = ceil($totalImages / $limit);
        $data = $this->getDoctrine()->getRepository($this->classEntity)->findAllEntities($offset, $limit);
        $data == null ? $view = $this->view('No media found.', 404) : $view = $this->view($data, 200);
        $paginatedCollection = new PaginatedRepresentation(
                new CollectionRepresentation(
                $data, 'media', // embedded rel
                'media'  // xml element name
                ), 'api_media_list', // route
                array(), // route parameters
                $offset, // page number
                $limit, // limit
                $maxPages, // total pages
                'page', // page route parameter name, optional, defaults to 'page'
                'limit', // limit route parameter name, optional, defaults to 'limit'
                false, // generate relative URIs, optional, defaults to `false`
                $totalImages      // total collection size, optional, defaults to `null`
        );
        return new Response($this->get('serializer')->serialize($paginatedCollection, 'json'), 200, array('Content-Type' => 'application/json'));
    }

    /**
     * @Route("api/media/", name="api_media_create")
     * @Method("POST")
     * @ApiDoc(
     *   resource = true,
     *   description = "Create a new Concert",
     *   statusCodes = {
     *     201 = "Returned when created",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     */
    public function postMediaAction(Request $request)
    {
        $newMedia = $this->container->get($this->serviceEntity)->post($request->files->get('file'));

        if ($newMedia->getId()) {
            $view = $this->view($newMedia, 200);
        } else {
            $view = $this->view('Couldnt Create Band', 500);
        }
        return $this->handleView($view);
    }

    /**
     * @Route("api/concert/{id}", name="api_concert_delete")
     * @Method("DELETE")
     * @ApiDoc(
     *  resource=true,
     *  description="Delete Band resource",
     * )
     */
    public function deleteImageAction(Request $request)
    {
        $entity = $this->getOr404($request->get('id'));
        $this->container->get($this->serviceEntity)->delete($entity);
        $view = $this->view(null, 204);
        return $this->handleView($view);
    }

    private function getOr404($id)
    {
        if (!($entity = $this->container->get($this->serviceEntity)->get($id))) {
            throw new NotFoundHttpException($this->classEntity . ' Not Found');
        }
        return $entity;
    }

}
