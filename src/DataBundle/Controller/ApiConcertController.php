<?php namespace DataBundle\Controller;

use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use DataBundle\Entity\Concert;
use DataBundle\Controller\BaseApiController as ApiController;

/**
 * Description of ApiConcertController
 *
 * @author Michel Khater
 */
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
        $response = parent::getAction($request, $paramFetcher);
        return($response);
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
     * @Route("api/concert/new", name="api_concert_form_new")
     * @Method("GET")
     * @ApiDoc(
     *  resource=true,
     *  description="Show Concert New Form",
     * )
     */
    public function concertNewFormAction(Request $request)
    {
        $form = $this->getConcertForm("POST", New Concert());
        $view = $this->view($form, 200)
            ->setTemplate($this->templateDirectory . "apiForm.html.twig")
            ->setTemplateData(['action' => 'Create']);
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
        $newConcert = $this->container->get($this->serviceEntity)->post($request->request->all());
        return $this->redirect($this->generateUrl('api_concert_show', array('id' => $newConcert->getId())));
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
     *   description = "Create a new Concert",
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
