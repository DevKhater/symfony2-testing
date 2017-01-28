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

class ApiCategoryController extends ApiController
{

    public function __construct()
    {
        $this->classEntity = 'DataBundle:Category';
        $this->serviceEntity = 'data.category.handler';
        $this->templateDirectory = 'DataBundle:Band:';
    }

    /**
     * @Route("/api/categories", name="api_category_list")
     * @Method("GET")
     * @ApiDoc(
     *   description="List Category Tree",
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when Successful",
     *     404 = "Returned when No Content Found",
     *   }
     * )
     * 
     * @Annotations\View(templateVar="bands")
     * 
     */
    public function getCategoryAction(Request $request)
    {
        $category = $this->container->get($this->serviceEntity)->getCategoryList();
        $view = $this->view($category, 200);
        return $this->handleView($view);
    }

    /**
     * @Route("api/category/{category}/{parent}", defaults={"parent": "0"}, name="api_category_create")
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
    public function postCategoryAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        $category = $request->get('category');
        $parent = $request->get('parent');
        if ($parent == 0) {
            $category = $this->container->get($this->serviceEntity)->addParentCategory($category);
            $view = $this->view($category, 200);
        } else {
            $this->getOr404($parent);
            $category = $this->container->get($this->serviceEntity)->addChildCategory($parent, $category);
            $view = $this->view($category, 200);
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
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        $bandReq = $this->container->get($this->serviceEntity)->get($request->get('slug'));
        $band = $this->container->get($this->serviceEntity)->put(
                $bandReq, $request->request->all()
        );
        $view = $this->view($band, 200);
        return $this->handleView($view);
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
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
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

    /**
     * @Route("api/category/{id}", name="api_category_delete")
     * @Method("DELETE")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     * @ApiDoc(
     *  resource=true,
     *  description="Delete Band resource",
     * )
     */
    public function deleteCategoryAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        $response = parent::deleteAction($request->get('id'));
        return($response);
    }

}