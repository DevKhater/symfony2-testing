<?php namespace DataBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
     * @Route("api/concert/{id}/edit", name="api_concert_form_edit")
     * @Method("GET")
     * @ApiDoc(
     *  resource=true,
     *  description="Show Concert Edit Form",
     * )
     */
    public function concertEditFormAction(Request $request)
    {

        $concert = $this->getOr404($request->get('id'));
        $form = $this->getConcertForm("PUT", $concert);
        $view = $this->view($form, 200)
            ->setTemplate($this->templateDirectory . "concertApiForm.html.twig")
            ->setTemplateData(['action' => 'Edit']);
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
        $conRequest = $this->container->get($this->serviceEntity)->get($request->get('id'));
        $concert = $this->container->get($this->serviceEntity)->put(
            $conRequest, $request->request->all()
        );
        return $this->redirect($this->generateUrl('api_concert_show', array('id' => $concert->getId())));
    }

    /**
     * @Route("api/concert/", name="api_concert_patch")
     * @Method("PATCH")
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
    public function patchConcertAction(Request $request)
    {
        
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
        $response = parent::deleteAction($request->get('id'));
        return($response);
    }

    private function getConcertForm($method, $concert)
    {
        switch ($method) {
            case "POST":
                $url = $this->generateUrl('api_concert_create');
                break;
            case "PUT":
                $url = $this->generateUrl('api_concert_update', ['id' => $concert->getId()]);
                break;
            case "POST":
                $url = $this->generateUrl('api_concert_patch', ['id' => $concert->getId()]);
                break;
        }
        return $this->container->get($this->serviceEntity)->createConcertForm($method, $concert, $url);
    }
}
