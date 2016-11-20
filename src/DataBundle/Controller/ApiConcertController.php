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
        $data = $this->getDoctrine()->getRepository('DataBundle:Concert')->findAllConcerts($offset, $limit);
        $counts = $this->getDoctrine()->getRepository('DataBundle:Concert')->countAllConcerts();
        $maxPages = ceil($counts / $limit);
        $thisPage = $offset;
        $view = $this->view($data, 200)
            ->setTemplate("DataBundle:Concert:getConcerts.html.twig")
            ->setTemplateData(['maxPages' => $maxPages,
                    'thisPage' => $thisPage, 'theIndex' => 'api_concerts_list']);
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
    public function deleteBandAction($slug)
    {
        $band = $this->getOr404($slug);
        $band[0]->getImage() == NULL ? '' : $this->container->get('mk.music.media.handler')->delete($band[0]->getImage());
        $this->container->get('data.band.handler')->delete($band[0]);
        $view = View::create();
        return $view;
    }

    
}
