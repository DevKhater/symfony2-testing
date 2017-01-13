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

class ApiLocationController extends ApiController
{

    public function __construct()
    {
        $this->classEntity = 'DataBundle:Location';
        $this->serviceEntity = 'data.location.handler';
        $this->templateDirectory = 'DataBundle:Location:';
    }

    /**
     * @Route("/api/locations", name="api_locations_list")
     * @Method("GET")
     * @ApiDoc(
     *   description="List All Locations",
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when Successful",
     *     404 = "Returned when No Content Found",
     *   },
     *  requirements={
     *      {
     *          "name"="offset",
     *          "dataType"="integer",
     *          "description"="offset to display locations"
     *      },
     *      {
     *          "name"="limit",
     *          "dataType"="integer",
     *          "description"="limit number per query Default (10)"
     *      },
     *  }
     * )
     * @Annotations\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing locations.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="10", description="How many locations to return.")
     * @Annotations\QueryParam(name="all", requirements="\d+", default="0", description="get All Locations.")
     *
     * @Annotations\View(templateVar="locations")
     * 
     */
    public function getLocationAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $data = $this->getDoctrine()->getRepository($this->classEntity)->findAll();
        $view = $this->view($data, 200);
        return $this->handleView($view);
    }

    /**
     * @Route("api/locations/{id}", name="api_location_show")
     * @Method("GET")
     * @ApiDoc(
     *  resource=true,
     *  description="Get Location by Slug",
     *  statusCodes = {
     *     200 = "Returned when Successful",
     *     404 = "Returned when No Content Found",
     *   }
     * )
     */
    public function showLocationAction(Request $request)
    {
        $id = $request->get('id');
        $response = parent::showAction($id);
        return($response);
    }
    
    /**
     * @Route("api/location/", name="api_location_create")
     * @Method("POST")
     * @ApiDoc(
     *   resource = true,
     *   description = "Create a new Location",
     *   input = "DataBundle\Form\LocationType",
     *   statusCodes = {
     *     201 = "Returned when created",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     */
    public function postLocationAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        $newLocation = $this->container->get($this->serviceEntity)->post($request->request->all());

        if ($newLocation->getId()) {
            $view = $this->view($newLocation, 200);
        } else {
            $view = $this->view('Couldnt Create Location', 500);
        }
        return $this->handleView($view);
    }

    /**
     * @Route("api/location/", name="api_location_update")
     * @Method("PUT")
     * @ApiDoc(
     *   resource = true,
     *   description = "Update a Location",
     *   statusCodes = {
     *     201 = "Returned when created",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     */
    public function putLocationAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        $locationReq = $this->container->get($this->serviceEntity)->get($request->get('id'));
        $location = $this->container->get($this->serviceEntity)->put(
                $locationReq, $request->request->all()
        );
        return $this->redirect($this->generateUrl('api_location_show', array('id' => $location->getId())));
    }
    
    /**
     * @Route("api/location/{id}", name="api_location_delete")
     * @Method("DELETE")
     * @ApiDoc(
     *  resource=true,
     *  description="Delete Location resource",
     * )
     */
    public function deleteLocationAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        $response = parent::deleteAction($request->get('id'));
        return($response);
    }

}
