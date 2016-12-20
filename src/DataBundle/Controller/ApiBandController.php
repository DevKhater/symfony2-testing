<?php

namespace DataBundle\Controller;

use FOS\RestBundle\Request\ParamFetcherInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use DataBundle\Entity\Band;
use DataBundle\Controller\BaseApiController as ApiController;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;
use Hateoas\Representation\PaginatedRepresentation;
use Hateoas\Representation\CollectionRepresentation;

class ApiBandController extends ApiController
{

    public function __construct()
    {
        $this->classEntity = 'DataBundle:Band';
        $this->serviceEntity = 'data.band.handler';
        $this->templateDirectory = 'DataBundle:Band:';
    }

    /**
     * @Route("/api/bands", name="api_bands_list")
     * @Method("GET")
     * @ApiDoc(
     *   description="List All Bands",
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when Successful",
     *     404 = "Returned when No Content Found",
     *   },
     *  requirements={
     *      {
     *          "name"="offset",
     *          "dataType"="integer",
     *          "description"="offset to display bands"
     *      },
     *      {
     *          "name"="limit",
     *          "dataType"="integer",
     *          "description"="limit number per query Default (10)"
     *      },
     *  }
     * )
     * @Annotations\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing bands.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="10", description="How many bands to return.")
     * @Annotations\QueryParam(name="all", requirements="\d+", default="0", description="get All Bands.")
     *
     * @Annotations\View(templateVar="bands")
     * 
     */
    public function getBandsAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $offset = null == $paramFetcher->get('offset') ? 1 : $paramFetcher->get('offset');
        //$limit = $paramFetcher->get('limit');
        $totalBands = $this->getDoctrine()->getRepository($this->classEntity)->countAllEntities();
        $limit = $paramFetcher->get('all') == 1 ? $totalBands : $paramFetcher->get('limit');
        $maxPages = ceil($totalBands / $limit);
        $data = $this->container->get($this->serviceEntity)->all($offset, $limit);
        $data == null ? $view = $this->view('No Bands found.', 404) : $view = $this->view($data, 200);
        $paginatedCollection = new PaginatedRepresentation(
                new CollectionRepresentation(
                $data, 'bands', // embedded rel
                'bands'  // xml element name
                ), 'api_bands_list', // route
                array(), // route parameters
                $offset, // page number
                $limit, // limit
                $maxPages, // total pages
                'page', // page route parameter name, optional, defaults to 'page'
                'limit', // limit route parameter name, optional, defaults to 'limit'
                false, // generate relative URIs, optional, defaults to `false`
                $totalBands      // total collection size, optional, defaults to `null`
        );



//        
//        $view->setTemplate($this->templateDirectory . "apiList.html.twig")
//                ->setTemplateData(['maxPages' => $maxPages,
//                    'thisPage' => $offset, 'theIndex' => 'api_concerts_list']);
//        return $this->handleView($view);
//    
        //$response = parent::getAction($request, $paramFetcher);
        return new Response($this->get('serializer')->serialize($paginatedCollection, 'json'), 200, array('Content-Type' => 'application/json'));
    }

    /**
     * @Route("api/bands/{slug}", name="api_band_show")
     * @Method("GET")
     * @ApiDoc(
     *  resource=true,
     *  description="Get Band by Slug",
     *  statusCodes = {
     *     200 = "Returned when Successful",
     *     404 = "Returned when No Content Found",
     *   }
     * )
     */
    public function showBandAction(Request $request)
    {
        $id = $request->get('slug');
        $response = parent::showAction($id);
        return($response);
    }

    /**
     * @Route("api/band/new", name="api_band_form_new")
     * @Method("GET")
     * @ApiDoc(
     *  resource=true,
     *  description="Show Band New Form",
     * )
     */
    public function bandNewFormAction(Request $request)
    {
        $form = $this->getBandForm("POST", New Band());
        $view = $this->view($form, 200)
                ->setTemplate($this->templateDirectory . "apiForm.html.twig")
                ->setTemplateData(['action' => 'Create']);
        return $this->handleView($view);
    }

    /**
     * @Route("api/band/genres", name="api_band_genres")
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
     * @Route("api/band/", name="api_band_create")
     * @Method("POST")
     * @ApiDoc(
     *   resource = true,
     *   description = "Create a new Band",
     *   input = "DataBundle\Form\BandType",
     *   statusCodes = {
     *     201 = "Returned when created",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     */
    public function postBandAction(Request $request)
    {
        $newBand = $this->container->get($this->serviceEntity)->post($request->request->all());

        if ($newBand->getSlug()) {
            $view = $this->view($newBand, 200);
        } else {
            $view = $this->view('Couldnt Create Band', 500);
        }
        return $this->handleView($view);
    }

    /**
     * @Route("api/band/{slug}/edit", name="api_band_form_edit")
     * @Method("GET")
     * @ApiDoc(
     *  resource=true,
     *  description="Show Band Edit Form",
     * )
     */
    public function bandEditFormAction(Request $request)
    {

        $band = $this->getOr404($request->get('slug'));
        $form = $this->getBandForm("PUT", $band);
        $view = $this->view($form, 200)
                ->setTemplate($this->templateDirectory . "bandApiForm.html.twig")
                ->setTemplateData(['action' => 'Edit']);
        return $this->handleView($view);
    }

    /**
     * @Route("api/band/", name="api_band_update")
     * @Method("PUT")
     * @ApiDoc(
     *   resource = true,
     *   description = "Update a Band",
     *   statusCodes = {
     *     201 = "Returned when created",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     */
    public function putBandAction(Request $request)
    {
        $bandReq = $this->container->get($this->serviceEntity)->get($request->get('slug'));
        $band = $this->container->get($this->serviceEntity)->put(
                $bandReq, $request->request->all()
        );
        return $this->redirect($this->generateUrl('api_band_show', array('slug' => $band->getSlug())));
    }

    /**
     * @Route("api/band/", name="api_band_patch")
     * @Method("PATCH")
     * @ApiDoc(
     *   resource = true,
     *   description = "Create a new Band",
     *   statusCodes = {
     *     201 = "Returned when created",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     */
    public function patchBandAction(Request $request)
    {
        
    }

    /**
     * @Route("api/band/{id}", name="api_band_delete")
     * @Method("DELETE")
     * @ApiDoc(
     *  resource=true,
     *  description="Delete Band resource",
     * )
     */
    public function deleteBandAction(Request $request)
    {
        $response = parent::deleteAction($request->get('id'));
        return($response);
    }

    /**
     * @Route("api/band/{slug}/{image}", name="api_band_add_image")
     * @Method("PATCH")
     * @ApiDoc(
     *  resource=true,
     *  description="Add Image To Band",
     * )
     */
    public function addBandImageAction(Request $request, $slug, $image)
    {
        $band = $this->getOr404($slug);
        $mediaManager = $this->container->get('mk.music.media.handler');
        $newImage = $mediaManager->get($image);
        if ($newImage) {
            $band[0]->getImage() != NULL ? $mediaManager->delete($band[0]->getImage()) : '';
            $band = $this->container->get('data.band.handler')->setImage($band[0], $newImage);
            $routeOptions = array(
                'slug' => $band->getSlug(),
                '_format' => $request->get('_format')
            );
            return $this->routeRedirectView('api_band_show', $routeOptions, Response::HTTP_OK);
        }
    }

    private function getBandForm($method, $band)
    {
        switch ($method) {
            case "POST":
                $url = $this->generateUrl('api_band_create');
                break;
            case "PUT":
                $url = $this->generateUrl('api_band_update', ['slug' => $band->getSlug()]);
                break;
            case "POST":
                $url = $this->generateUrl('api_band_patch', ['slug' => $band->getSlug()]);
                break;
        }
        return $this->container->get($this->serviceEntity)->createBandForm($method, $band, $url);
    }

}
