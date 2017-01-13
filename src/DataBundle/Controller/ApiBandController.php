<?php

namespace DataBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Hateoas\Representation\PaginatedRepresentation;
use Hateoas\Representation\CollectionRepresentation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use DataBundle\Controller\BaseApiController as ApiController;
use MK\ApiBundle\Api\ApiProblem;

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
        $totalBands = $this->getDoctrine()->getRepository($this->classEntity)->countAllEntities();
        $limit = $paramFetcher->get('all') == 1 ? $totalBands : $paramFetcher->get('limit');
        $maxPages = ceil($totalBands / $limit);
        $data = $this->container->get($this->serviceEntity)->all($offset, $limit);
        if ($data == null) {
            $view = $this->view('No Bands found.', 404);
        } else {
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
            $view = $this->view($paginatedCollection, 200);
        }
        return $this->handleView($view);
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
     * @Security("has_role('ROLE_SUPER_ADMIN')")
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
            $problem = new ApiProblem(500, 'Error', 'Can\'t create Band');
            $view = $this->view($problem, 500);
        }
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
        $view = $this->view($band, 200);
        return $this->handleView($view);
    }

    /**
     * @Route("api/band/{id}", name="api_band_delete")
     * @Method("DELETE")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
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
        $mediaManager = $this->container->get('data.media.handler');
        $newImage = $mediaManager->get($image);
        if ($newImage) {
            //$band->getImage() != NULL ? $mediaManager->delete($band->getImage()) : '';
            $band = $this->container->get('data.band.handler')->setImage($band, $newImage);
            $view = $this->view('Image Added To Band', 200);
        } else {
            $view = $this->view('Error', 500);
        }
        return $this->handleView($view);
    }

}
