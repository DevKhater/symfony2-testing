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

class ApiGalleryController extends FOSRestController
{

    public function __construct()
    {
        $this->classEntity = 'DataBundle:Gallery';
        $this->serviceEntity = 'data.gallery.handler';
        $this->templateDirectory = 'DataBundle:Gallery:';
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
    public function addGalleryImageAction(Request $request, $id, $image)
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        $gallery = $this->getOr404($id);
        $mediaManager = $this->container->get('data.media.handler');
        $newImage = $mediaManager->get($image);
        if ($newImage) {
            $band = $this->container->get('data.gallery.handler')->addImage($gallery, $newImage);
            $view = $this->view('Image Added To Gallery', 200);
        } else {
            $view = $this->view('Image Not Found', 404);
        }
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
        $mediaManager = $this->container->get('data.media.handler');
        $newImage = $mediaManager->get($image);
        if ($newImage) {
            $band = $this->container->get('data.gallery.handler')->removeImage($gallery, $newImage);
            $view = $this->view('Image Removed from Gallery', 200);
        } else {
            $view = $this->view('Image Not Found', 404);
        }
        return $this->handleView($view);
    }
    
        public function getOr404($id)
    {
        if (!($entity = $this->container->get($this->serviceEntity)->get($id))) {
            throw new NotFoundHttpException($this->classEntity . ' Not Found');
        }
        return $entity;
    }

}