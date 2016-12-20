<?php

namespace DataBundle\Controller;

use FOS\RestBundle\Request\ParamFetcherInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use DataBundle\Entity\Location;
use DataBundle\Controller\BaseApiController as ApiController;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;
use Hateoas\Representation\PaginatedRepresentation;
use Hateoas\Representation\CollectionRepresentation;

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
        return new Response($this->get('serializer')->serialize($data, 'json'), 200, array('Content-Type' => 'application/json'));
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
     * @Route("api/location/new", name="api_location_form_new")
     * @Method("GET")
     * @ApiDoc(
     *  resource=true,
     *  description="Show Location New Form",
     * )
     */
    public function locationNewFormAction(Request $request)
    {
        $form = $this->getLocationForm("POST", New Location());
        $view = $this->view($form, 200)
                ->setTemplate($this->templateDirectory . "apiForm.html.twig")
                ->setTemplateData(['action' => 'Create']);
        return $this->handleView($view);
    }

    /**
     * @Route("api/location/genres", name="api_location_genres")
     * @Method("GET")
     * @ApiDoc(
     *  resource=true,
     *  description="Get All Genres",
     * )
     */
    public function getGenresAction(Request $request)
    {
        $genres = $this->container->get($this->serviceEntity)->getGenres();
        $view = $this->view($genres, 200);
        return $this->handleView($view);
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
        $newLocation = $this->container->get($this->serviceEntity)->post($request->request->all());

        if ($newLocation->getId()) {
            $view = $this->view($newLocation, 200);
        } else {
            $view = $this->view('Couldnt Create Location', 500);
        }
        return $this->handleView($view);
    }

    /**
     * @Route("api/location/{id}/edit", name="api_location_form_edit")
     * @Method("GET")
     * @ApiDoc(
     *  resource=true,
     *  description="Show Location Edit Form",
     * )
     */
    public function locationEditFormAction(Request $request)
    {

        $location = $this->getOr404($request->get('id'));
        $form = $this->getLocationForm("PUT", $location);
        $view = $this->view($form, 200)
                ->setTemplate($this->templateDirectory . "locationApiForm.html.twig")
                ->setTemplateData(['action' => 'Edit']);
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
        $locationReq = $this->container->get($this->serviceEntity)->get($request->get('id'));
        $location = $this->container->get($this->serviceEntity)->put(
                $locationReq, $request->request->all()
        );
        return $this->redirect($this->generateUrl('api_location_show', array('id' => $location->getId())));
    }

    /**
     * @Route("api/location/", name="api_location_patch")
     * @Method("PATCH")
     * @ApiDoc(
     *   resource = true,
     *   description = "Create a new Location",
     *   statusCodes = {
     *     201 = "Returned when created",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     */
    public function patchLocationAction(Request $request)
    {
        
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
        $response = parent::deleteAction($request->get('id'));
        return($response);
    }

    /**
     * @Route("api/location/{id}/{image}", name="api_location_add_image")
     * @Method("PATCH")
     * @ApiDoc(
     *  resource=true,
     *  description="Add Image To Location",
     * )
     */
    public function addLocationImageAction(Request $request, $id, $image)
    {
        $location = $this->getOr404($id);
        $mediaManager = $this->container->get('mk.music.media.handler');
        $newImage = $mediaManager->get($image);
        if ($newImage) {
            $location[0]->getImage() != NULL ? $mediaManager->delete($location[0]->getImage()) : '';
            $location = $this->container->get('data.location.handler')->setImage($location[0], $newImage);
            $routeOptions = array(
                'id' => $location->getId(),
                '_format' => $request->get('_format')
            );
            return $this->routeRedirectView('api_location_show', $routeOptions, Response::HTTP_OK);
        }
    }

    private function getLocationForm($method, $location)
    {
        switch ($method) {
            case "POST":
                $url = $this->generateUrl('api_location_create');
                break;
            case "PUT":
                $url = $this->generateUrl('api_location_update', ['id' => $location->getId()]);
                break;
            case "POST":
                $url = $this->generateUrl('api_location_patch', ['id' => $location->getId()]);
                break;
        }
        return $this->container->get($this->serviceEntity)->createLocationForm($method, $location, $url);
    }

}
