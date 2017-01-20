<?php

namespace DataBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use DataBundle\Controller\BaseApiController as ApiController;
use MK\ApiBundle\Api\ApiProblem;

class ApiMediaController extends ApiController
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
     * * @Annotations\QueryParam(name="all", requirements="\d+", default="0", description="get All Bands.")
     *
     * @Annotations\View(templateVar="media")
     */
    public function getMediaAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $totalImages = $this->getDoctrine()->getRepository($this->classEntity)->countAllEntities();
        if ($totalImages != 0) {
            $op = parent::getList($request, $paramFetcher, $totalImages);
            $paginatedCollection = parent::createPaginations($op[0], 'media', 'api_media_list', $op[1], $op[2], $op[3], $totalImages);
            $view = $this->view($paginatedCollection, 200);
        } else {
            $view = $this->view([], 200);
        }
        return $this->handleView($view);
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
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        $newMedia = $this->container->get($this->serviceEntity)->post($request->files->get('file'));

        if ($newMedia->getId()) {
            $view = $this->view($newMedia, 200);
        } else {
            $problem = new ApiProblem(500, 'Error', 'Can\'t create Image');
            $view = $this->view($problem, 500);
        }
        return $this->handleView($view);
    }

    /**
     * @Route("api/media/{id}", name="api_media_delete")
     * @Method("DELETE")
     * @ApiDoc(
     *  resource=true,
     *  description="Delete Band resource",
     * )
     */
    public function deleteImageAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        $entity = $this->getOr404($request->get('id'));
        $this->container->get($this->serviceEntity)->delete($entity);
        $view = $this->view(null, 204);
        return $this->handleView($view);
    }

}
