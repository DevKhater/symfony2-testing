<?php

namespace DataBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Hateoas\Representation\PaginatedRepresentation;
use Hateoas\Representation\CollectionRepresentation;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use DataBundle\Controller\BaseApiController as ApiController;

class ApiConcertController extends ApiController
{

    public function __construct()
    {
        $this->classEntity = 'DataBundle:Concert';
        $this->serviceEntity = 'data.concert.handler';
        $this->templateDirectory = 'DataBundle:Concert:';
    }

    /**
     * @Route("api/concerts", name="api_concerts_list")
     * @Method("GET")
     * @ApiDoc(
     *   description="List All Concert",
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
     * @Annotations\View(templateVar="concerts")
     */
    public function getConcertAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $offset = null == $paramFetcher->get('offset') ? 1 : $paramFetcher->get('offset');
        $totalBands = $this->getDoctrine()->getRepository($this->classEntity)->countAllEntities();
        $limit = $paramFetcher->get('limit');
        $totalConcerts = $this->getDoctrine()->getRepository($this->classEntity)->countAllEntities();
        $maxPages = ceil($totalConcerts / $limit);
        $data = $this->container->get($this->serviceEntity)->all($offset, $limit);
        if ($data == null){
            $view = $this->view('No concerts found.', 404);
        } else {
            $paginatedCollection = new PaginatedRepresentation(
                    new CollectionRepresentation(
                    $data, 'concerts', // embedded rel
                    'concerts'  // xml element name
                    ), 'api_concerts_list', // route
                    array(), // route parameters
                    $offset, // page number
                    $limit, // limit
                    $maxPages, // total pages
                    'page', // page route parameter name, optional, defaults to 'page'
                    'limit', // limit route parameter name, optional, defaults to 'limit'
                    false, // generate relative URIs, optional, defaults to `false`
                    $totalConcerts      // total collection size, optional, defaults to `null`
            );
            $view = $this->view($paginatedCollection, 200);
        }
        return $this->handleView($view);
    }

    /**
     * @Route("api/concerts/{id}", name="api_concert_show")
     * @Method("GET")
     * @ApiDoc(
     *  resource=true,
     *  description="Show Concert resource",
     * )
     * 
     */
    public function showConcertAction(Request $request)
    {
        $id = $request->get('id');
        $response = parent::showAction($id);
        return($response);
    }

    /**
     * @Route("api/concert/{id}/band", name="api_concert_get_band")
     * @Method("GET")
     * @ApiDoc(
     *  resource=true,
     *  description="Show Concert's Band",
     * )
     */
    public function getConcertBandAction(Request $request)
    {
        $data = $this->getOr404($request->get('id'))->getBand()->getName();
        $view = $this->view($data, 200)
                ->setTemplate($this->templateDirectory . "concertApiShowFields.html.twig")
                ->setTemplateData(['element' => 'Band Name']);
        return $this->handleView($view);
    }

    /**
     * @Route("api/concert/{id}/band/{name}", name="api_concert_patch_band")
     * @Method("PATCH")
     * @ApiDoc(
     *  resource=true,
     *  description="Show Concert's Band",
     * )
     */
    public function patchConcertBandAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        $newName = $request->get('name');
        $concert = $this->getOr404($request->get('id'));
        $updatedConcert = $this->container->get($this->serviceEntity)->patchBand($concert, $newName);
        return $this->forward('DataBundle:ApiConcert:showConcert', array('id' => $updatedConcert->getId()));
    }

    /**
     * @Route("api/concert/{id}/genre", name="api_concert_get_genre")
     * @Method("GET")
     * @ApiDoc(
     *  resource=true,
     *  description="Show Concert Genre",
     * )
     */
    public function getConcertGenreAction(Request $request)
    {
        $data = $this->getOr404($request->get('id'))->getBand()->getGenre();
        $view = $this->view($data, 200)
                ->setTemplate($this->templateDirectory . "concertApiShowFields.html.twig")
                ->setTemplateData(['element' => 'Band Genre']);

        return $this->handleView($view);
    }

    /**
     * @Route("api/concert/{id}/location", name="api_concert_get_location")
     * @Method("GET")
     * @ApiDoc(
     *  resource=true,
     *  description="Show Concert Location",
     * )
     */
    public function getConcertLocationAction(Request $request)
    {
        $location = $this->getOr404($request->get('id'))->getLocation();
        $data = ['data' => ['name' => $location->getName(), 'address' => $location->getAddress()]];
        $view = $this->view($data, 200)
                ->setTemplate($this->templateDirectory . "concertApiShowFields.html.twig")
                ->setTemplateData(['element' => 'Location']);

        return $this->handleView($view);
    }

    /**
     * @Route("api/concert/{id}/date", name="api_concert_get_date")
     * @Method("GET")
     * @ApiDoc(
     *  resource=true,
     *  description="Show Concert Date",
     * )
     */
    public function getConcertDateAction(Request $request)
    {
        $data = $this->getOr404($request->get('id'))->getDate();
        $view = $this->view($data, 200)
                ->setTemplate($this->templateDirectory . "concertApiShowFields.html.twig")
                ->setTemplateData(['element' => 'Date']);

        return $this->handleView($view);
    }

    /**
     * @Route("api/concert/", name="api_concert_create")
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
    public function postConcertAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        $newConcert = $this->container->get($this->serviceEntity)->post($request->request->all());
        if ($newConcert) {
            $view = $this->view('Concert Created', 200);
        } else {
            $view = $this->view('Error Can\'t Create Concert', 500);
        }
        return $this->handleView($view);
    }

    /**
     * @Route("api/concert/", name="api_concert_update")
     * @Method("PUT")
     * @ApiDoc(
     *   resource = true,
     *   description = "Update a Concert",
     *   statusCodes = {
     *     201 = "Returned when created",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     */
    public function putConcertAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        $conRequest = $this->container->get($this->serviceEntity)->get($request->get('id'));
        $concert = $this->container->get($this->serviceEntity)->put(
                $conRequest, $request->request->all()
        );
        if ($concert) {
            $view = $this->view('Concert Created', 200);
        } else {
            $view = $this->view('Error Can\'t Create Concert', 500);
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
    public function deleteConcertAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        $response = parent::deleteAction($request->get('id'));
        return($response);
    }

}
