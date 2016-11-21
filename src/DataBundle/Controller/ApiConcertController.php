<?php

namespace DataBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use DataBundle\Entity\Concert;

/**
 * Description of ApiConcertController
 *
 * @author Michel
 */
class ApiConcertController extends FosRestController
{

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
    public function getConcertsAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $offset = $paramFetcher->get('offset');
        $offset = null == $offset ? 1 : $offset;
        $limit = $paramFetcher->get('limit');
        $maxPages = ceil($this->getDoctrine()->getRepository('DataBundle:Concert')->countAllConcerts() / $limit);
        $data = $this->container->get('data.concert.handler')->all($offset, $limit);
        $data == null ? $view = $this->view('No concerts found.', 404) : $view = $this->view($data, 200);
        $view->setTemplate("DataBundle:Concert:concertApiList.html.twig")
                ->setTemplateData(['maxPages' => $maxPages,
            'thisPage' => $offset, 'theIndex' => 'api_concerts_list']);
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
        $data = $this->getOr404($id);
        $view = $this->view($data, 200)
                ->setTemplate("DataBundle:Concert:concertApiShow.html.twig");
        return $this->handleView($view);
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
                ->setTemplate("DataBundle:Concert:concertApiShowFields.html.twig")
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
                ->setTemplate("DataBundle:Concert:concertApiShowFields.html.twig")
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
        $data = ['name' => $location->getName(), 'address' => $location->getAddress()];
        $view = $this->view($data, 200)
                ->setTemplate("DataBundle:Concert:concertApiShowFields.html.twig")
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
                ->setTemplate("DataBundle:Concert:concertApiShowFields.html.twig")
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
                ->setTemplate("DataBundle:Concert:concertApiForm.html.twig")
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
        $newConcert = $this->container->get('data.concert.handler')->post($request->request->all());
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
                ->setTemplate("DataBundle:Concert:concertApiForm.html.twig")
                ->setTemplateData(['action' => 'Edit']);
        ;
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
        $concert = $this->container->get('data.concert.handler')->get($request->get('id'));
        $concert2 = $this->container->get('data.concert.handler')->put(
                $concert, $request->request->all()
        );
        return $this->redirect($this->generateUrl('api_concert_show', array('id' => $concert2->getId())));
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
    public function deleteConcertAction($id)
    {
        $concert = $this->getOr404($id);
        $this->container->get('data.concert.handler')->delete($concert);
        $view = View::create();
        $view->setData(["message" => "Concert deleted."])
                ->setStatusCode(410);
        return $this->handleView($view);
    }

    private function getOr404($id)
    {
        if (!($concert = $this->container->get('data.concert.handler')->get($id))) {
            throw new NotFoundHttpException('Concert Not Found');
        }
        return $concert;
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
        return $this->container->get('data.concert.handler')->createConcertForm($method, $concert, $url);
    }

}
