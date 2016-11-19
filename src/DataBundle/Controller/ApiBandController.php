<?php

namespace DataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use FOS\RestBundle\Controller\FOSRestController;
//use FOS\RestBundle\Controller\Annotations;
//use FOS\RestBundle\View\View;
//use FOS\RestBundle\Request\ParamFetcherInterface;
use JMS\Serializer\SerializationContext;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\FormTypeInterface;
//use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
//use Symfony\Component\HttpKernel\Exception\HttpException;
//use DataBundle\Entity\Band;
use DataBundle\Form\BandType;
//use DataBundle\Form\UpdateBandType;
use MK\ApiBundle\Api\ApiProblem;

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
     *   }
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
     * @Route("api/band/", name="api_band_form")
     * @Method("GET")
     *
     * @ApiDoc(
     *  resource = true,
     *  description="Get Create Band Form",
     *  statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     */
    public function newBandAction()
    {
        return $this->createApiResponse($this->createForm(new BandType()));
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
            $newBand = $this->container->get('data.band.handler')->post(
                    $request
                    //->request->all()
            );

            $routeOptions = array(
                'slug' => $newBand->getSlug(),
                '_format' => $request->get('_format')
            );

            return $this->routeRedirectView('api_band_show', $routeOptions, Response::HTTP_CREATED);
        } catch (InvalidFormException $exception) {

            return $exception->getForm();
        }
    }

    /**
     * @Route("api/band/update/{slug}", name="api_band_update")
     * @Method({"PUT"})
     * @ApiDoc(
     *   resource = true,
     *   description = "Update a Band resource",
     *   input = "DataBundle\Form\BandType",
     *   statusCodes = {
     *     200 = "Returned when updated",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     * /
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
      $band, $request->request->all()
      );
      }

      $routeOptions = array(
      'slug' => $band->getSlug(),
      '_format' => $request->get('_format')
      );

      return $this->routeRedirectView('api_band_show', $routeOptions, $statusCode);
      } catch (InvalidFormException $exception) {

      return $exception->getForm();
      }
      }

      /**
     * @Route("/band/update/{slug}", name="api_band_update")
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
            $band = $this->container->get('data.band.handler')->patch(
                    $this->getOr404($slug)[0], $request
                    //->request->all()
            );

            $routeOptions = array(
                'slug' => $band->getSlug(),
                '_format' => $request->get('_format')
            );

            return $this->routeRedirectView('api_band_show', $routeOptions, Response::HTTP_NO_CONTENT);
        } catch (InvalidFormException $exception) {

            return $exception->getForm();
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

    protected function getOr404($id)
    {
        if (!($band = $this->container->get('data.band.handler')->get($id))) {
            return $this->get('mk.api.response_factory')->createResponse(new ApiProblem(404, 'Not Found', 'Band Not Found'));
        }
        return $band;
    }

    private function serialize($data, $format = 'json')
    {
        $context = new SerializationContext();
        $context->setSerializeNull(true);
        return $this->container->get('jms_serializer')->serialize($data, $format, $context);
    }

    protected function createApiResponse($data, $statusCode = 200)
    {
        $json = $this->serialize($data);
        return new Response($json, $statusCode, array(
            'Content-Type' => 'application/json'
        ));
    }

    private function createCreateBandForm(Band $band)
    {
        $form = $this->createForm(new BandType(), $band, array(
            'action' => $this->generateUrl('api_band_create'),
            'method' => 'POST',
        ));
        return $form;
    }

}
