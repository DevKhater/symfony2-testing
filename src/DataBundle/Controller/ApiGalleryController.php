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

class ApiGalleryController extends ApiController
{

    public function __construct()
    {
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
    public function getGalleriesAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $totalGalleries = $this->getDoctrine()->getRepository($this->classEntity)->countAllEntities();
        if ($totalGalleries != 0) {
            $op = parent::getList($request, $paramFetcher, $totalGalleries);
            $paginatedCollection = parent::createPaginations($op[0], 'gallery', 'api_gallery_list', $op[1], $op[2], $op[3], $totalGalleries);

            $offset = null == $paramFetcher->get('offset') ? 1 : $paramFetcher->get('offset');
            $paramFetcher->get('all') == 1 ? $limit = $totalGalleries : $limit = $paramFetcher->get('limit');
            if ($limit != 0)
                $maxPages = ceil($totalGalleries / $limit);
            $data = $this->container->get($this->serviceEntity)->all($offset, $limit);

            $view = $this->view($paginatedCollection, 200);
        } else {
            $view = $this->view([], 200);
        }
        return $this->handleView($view);
    }

    /**
     * @Route("api/gallery/{id}", name="api_gallery_show")
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
    public function getBandAction(Request $request)
    {
        $id = $request->get('id');
        $response = parent::showAction($id);
        return($response);
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
    public function postGalleryAction(Request $request)
    {
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
     * @Route("api/gallery/", name="api_gallery_add_images")
     * @Method("PATCH")
     * @ApiDoc(
     *  resource=true,
     *  description="Add Images To Gallery",
     * )
     */
    public function addGalleryImagesAction(Request $request, $id)
    {
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
     * @Route("api/gallery/{id}/{name}", name="api_gallery_patch_name")
     * @Method("PATCH")
     * @ApiDoc(
     *  resource=true,
     *  description="Show Concert's Band",
     * )
     */
    public function patchGalleryNameAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        $newName = $request->get('name');
        $gallery = $this->getOr404($request->get('id'));
        $this->container->get($this->serviceEntity)->editGallery($gallery, $newName);
        $view = $this->view('Gallery Name Updated', 200);
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
    public function removeGalleryImageAction(Request $request, $id, $image)
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        $gallery = $this->getOr404($id);
        $newImage = $this->fetchImage($image);
        if ($newImage) {
            $band = $this->container->get($this->serviceEntity)->removeImage($gallery, $newImage);
            $view = $this->view('Image Removed from Gallery', 200);
        } else {
            $view = $this->view('Image Not Found', 404);
        }
        return $this->handleView($view);
    }
    
    
    /**
     * @Route("api/gallery/{id}", name="api_gallery_delete")
     * @Method("DELETE")
     * @ApiDoc(
     *  resource=true,
     *  description="Delete Gallery resource",
     * )
     */
    public function deleteGalleryAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        $response = parent::deleteAction($request->get('id'));
        return($response);
    }
    
    private function fetchImage($image)
    {
        $mediaManager = $this->container->get('data.media.handler');
        return $mediaManager->get($image);
    }
}
