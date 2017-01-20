<?php

namespace DataBundle\Controller;

use FOS\RestBundle\Request\ParamFetcherInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Hateoas\Representation\PaginatedRepresentation;
use Hateoas\Representation\CollectionRepresentation;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use MK\ApiBundle\Api\ApiProblem;
use DataBundle\Controller\BaseApiController as ApiController;

class ApiGalleryController extends ApiController {

    public function __construct() {
        $this->classEntity = 'DataBundle:Gallery';
        $this->serviceEntity = 'data.gallery.handler';
        $this->templateDirectory = 'DataBundle:Gallery:';
    }

    /**
     * @Route("api/gallery", name="api_gallery_list")
     * @Method("GET")
     * @ApiDoc(
     *   description="List All Galleries",
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when Successful",
     *     404 = "Returned when No Content Found",
     *   }
     * )
     *
     * @Annotations\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing galleries.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="10", description="How many galleries to return.")
     * @Annotations\QueryParam(name="all", requirements="\d+", default="0", description="get All galleries.")
     *
     */
    public function getGalleryAction(Request $request, ParamFetcherInterface $paramFetcher) {
        $totalGalleries = $this->getDoctrine()->getRepository($this->classEntity)->countAllEntities();
        if ($totalGalleries != 0) {
            $offset = null == $paramFetcher->get('offset') ? 1 : $paramFetcher->get('offset');
            $paramFetcher->get('all') == 1 ? $limit = $totalGalleries : $limit = $paramFetcher->get('limit');
            if ($limit != 0)
                $maxPages = ceil($totalGalleries / $limit);
            $data = $this->container->get($this->serviceEntity)->all($offset, $limit);
            $paginatedCollection = parent::createPaginations($data, 'gallery', 'api_gallery_list', $offset, $limit, $maxPages, $totalGalleries);
            $view = $this->view($paginatedCollection, 200);
        } else {
            $view = $this->view([], 200);
        }
        return $this->handleView($view);
    }

    /**
     * @Route("api/gallery/", name="api_gallery_create")
     * @Method("POST")
     * @ApiDoc(
     *   resource = true,
     *   description = "Create a new Gallery",
     *   input = "DataBundle\Form\GalleryType",
     *   statusCodes = {
     *     201 = "Returned when created",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     */
    public function postGalleryAction(Request $request) {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        $newGallery = $this->container->get($this->serviceEntity)->post($request->request->all());
        dump($request);
        if ($newGallery->getId()) {
            $view = $this->view($newGallery, 200);
        } else {
            $problem = new ApiProblem(500, 'Error', 'Can\'t create Gallery');
            $view = $this->view($problem, 500);
        }
        return $this->handleView($view);
    }

    /**
     * @Route("api/gallery/{id}/{image}", name="api_gallery_add_image")
     * @Method("PATCH")
     * @ApiDoc(
     *  resource=true,
     *  description="Add Image To Gallery",
     * )
     */
    public function addGalleryImageAction(Request $request, $id, $image) {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        $gallery = $this->getOr404($id);
        $mediaManager = $this->container->get('data.media.handler');
        $newImage = $mediaManager->get($image);
        if ($newImage) {
            $band = $this->container->get($this->serviceEntity)->addImage($gallery, $newImage);
            $view = $this->view('Image Added To Gallery', 200);
        } else {
            $view = $this->view('Image Not Found', 404);
        }
        return $this->handleView($view);
    }

    /**
     * @Route("api/gallery/", name="api_gallery_add_images")
     * @Method("PATCH")
     * @ApiDoc(
     *  resource=true,
     *  description="Add Images To Gallery",
     * )
     */
    public function addGalleryImagesAction(Request $request, $id) {
        $data = $request->request->all();
        $galleryId = $request->request->get('data')['id'];
        $medias = $request->request->get('data')['medias'];
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        $gallery = $this->getOr404($galleryId);
        $this->container->get($this->serviceEntity)->addImages($gallery, $medias);
        $view = $this->view('Images Added To Gallery', 200);
        return $this->handleView($view);
    }

    /**
     * @Route("api/gallery/{id}/{image}", name="api_gallery_remove_image")
     * @Method("DELETE")
     * @ApiDoc(
     *  resource=true,
     *  description="Add Image To Gallery",
     * )
     */
    public function removeGalleryImageAction(Request $request, $id, $image) {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        $gallery = $this->getOr404($id);
        $mediaManager = $this->container->get('data.media.handler');
        $newImage = $mediaManager->get($image);
        if ($newImage) {
            $band = $this->container->get($this->serviceEntity)->removeImage($gallery, $newImage);
            $view = $this->view('Image Removed from Gallery', 200);
        } else {
            $view = $this->view('Image Not Found', 404);
        }
        return $this->handleView($view);
    }

    public function getOr404($id) {
        if (!($entity = $this->container->get($this->serviceEntity)->get($id))) {
            throw new NotFoundHttpException($this->classEntity . ' Not Found');
        }
        return $entity;
    }

}
