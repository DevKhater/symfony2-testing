<?php

namespace DataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\Serializer\SerializationContext;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Form\FormTypeInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use DataBundle\Entity\Band;
use DataBundle\Form\Api\ApiBandType;
use DataBundle\Form\Api\ApiBandPATCHType;

class ApiBandController extends Controller
{

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
     * 
     */
    public function getBandsAction(Request $request, $offset, $limit)
    {
        $offset = null == $offset ? 0 : $offset;
        $limit = null == $limit ? 8 : $limit;
        $bands = $this->container->get('data.band.handler')->all($limit, $offset);
        return $this->createApiResponse($bands);
    }

    /**
     * @Route("api/band/{slug}", name="api_band_show")
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
    public function showAction($slug)
    {
        $band = $this->getOr404($slug);
        return $this->createApiResponse($band);
    }

    /**
     * @Route("api/form/band/{type}/", name="api_band_new_form")
     * @Route("api/form/band/{type}/{slug}", name="api_band_form")
     * @Method("GET")
     *
     * @ApiDoc(
     *  resource = true,
     *  description="Get Band Form TYPES [new, edit, clone]",
     *  statusCodes = {
     *     200 = "Returned when successful"
     *   },
     *  requirements={
     *      {
     *          "name"="type",
     *          "dataType"="string",
     *          "requirement"="new | edit | clone",
     *          "description"="form depends on request type POST, PATCH, PUT"
     *      }
     *  }
     * )
     * 
     * @Template()
     */
    public function bandFormAction(Request $request)
    {
        $type = $request->attributes->get('type');
        $slug = $request->attributes->get('slug');
        if (!is_null($slug))
            $band = $band = $this->getOr404($slug);
        if ($band instanceof Response)
            return $band;
        switch ($type) {
            case 'new':
                $form = $this->createBandForm('POST', new Band());
                break;
            case 'edit':
                $form = $this->createBandForm('PATCH', $band[0]);
                break;
            case 'clone':
                $form = $this->createBandForm('PUT', $band[0]);
                break;
            default :
                return $this->createApiResponse('Type Not Found', 404);
        }
        return array('form' => $form->createView());
    }

    /**
     * @Route("api/band/", name="api_band_create")
     * @Method("POST")
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
        try {
            $newBand = $this->container->get('data.band.handler')->post($request->request->all());
            return $this->redirect($this->generateUrl('api_band_show', array('slug' => $newBand->getSlug())));
        } catch (InvalidFormException $exception) {
            return $this->createApiResponse($exception->getForm(), 500);
        }
    }

    /**
     * @Route("api/band/update/{slug}", name="api_band_update")
     * @Method("PUT")
     * @ApiDoc(
     *   resource = true,
     *   description = "Update a Band resource",
     *   input = "DataBundle\Form\BandType",
     *   statusCodes = {
     *     200 = "Returned when updated",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     * 
     */
    public function putBandAction(Request $request, $slug)
    {
        try {
            if (!($band = $this->container->get('data.band.handler')->get($slug))) {
                $statusCode = Response::HTTP_CREATED;
                $band = $this->container->get('data.band.handler')->post(
                        $request->request->all()
                );
            } else {
                $statusCode = Response::HTTP_NO_CONTENT;
                $band = $this->container->get('data.band.handler')->put(
                        $band[0], $request->request->all()
                );
            }

            return $this->redirect($this->generateUrl('api_band_show', array('slug' => $band->getSlug())));
        } catch (InvalidFormException $exception) {

            return $this->createApiResponse($exception->getForm(), 500);
        }
    }

    /**
     * @Route("api/band/update/{slug}", name="api_band_patch")
     * @Method({"PATCH"})
     * @ApiDoc(
     *   resource = true,
     *   description = "Update a Band resource",
     *   input = "DataBundle\Form\BandType",
     *   statusCodes = {
     *     200 = "Returned when updated",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     * 
     */
    public function patchBandAction(Request $request, $slug)
    {
        try {
            if (!($band = $this->container->get('data.band.handler')->get($slug) instanceof Band)) {
                return $this->createApiResponse("Band Not Found", 404);
            }
            $band = $this->container->get('data.band.handler')->patch(
                    $this->container->get('data.band.handler')->get($slug)[0], $request->request->all()
            );

            return $this->redirect($this->generateUrl('api_band_show', array('slug' => $band->getSlug())));
        } catch (InvalidFormException $exception) {
            return $this->createApiResponse($exception->getForm(), 500);
        }
    }

    /**
     * @Route("api/band/{slug}", name="api_band_delete")
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
        $mediaManager = $this->container->get('mk.music.media.handler');
        $newImage = $mediaManager->get($image);
        if ($newImage) {
            $band[0]->getImage() != NULL ? $mediaManager->delete($band[0]->getImage()) : '';
            $band = $this->container->get('data.band.handler')->setImage($band[0], $newImage);
            $routeOptions = array(
                'slug' => $band->getSlug(),
                '_format' => $request->get('_format')
            );
            return $this->routeRedirectView('api_band_show', $routeOptions, Response::HTTP_OK);
        }
    }

    private function getOr404($id)
    {
        if (!($band = $this->container->get('data.band.handler')->get($id))) {
            return $this->createApiResponse('Band Not Found', 404);
        }
        return $band;
    }

    private function serialize($data, $format = 'json')
    {
        $context = new SerializationContext();
        $context->setSerializeNull(true);
        return $this->container->get('jms_serializer')->serialize($data, $format, $context);
    }

    private function createApiResponse($data, $statusCode = 200)
    {
        $json = $this->serialize($data);
        return new Response($json, $statusCode, array(
            'Content-Type' => 'application/json'
        ));
    }

    private function createBandForm($method, $band)
    {
        if ($method == "POST")
            $form = $this->createForm(new ApiBandType(), $band, array('action' => $this->generateUrl('api_band_create'), 'method' => $method));
        $method == "PATCH" ? $action = $this->generateUrl('api_band_patch', array('slug' => $band->getSlug())) : $action = $this->generateUrl('api_band_update', array('slug' => $band->getSlug()));
        $method == "PATCH" ?
                        $form = $this->createForm(new ApiBandPATCHType(), $band, array('action' => $action, 'method' => $method)) : $form = $this->createForm(new ApiBandType(), $band, array('action' => $action, 'method' => $method));
        return $form;
    }

}
