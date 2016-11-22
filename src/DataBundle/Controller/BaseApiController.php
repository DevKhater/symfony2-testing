<?php namespace DataBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Description of ApiConcertController
 *
 * @author Michel
 */
class BaseApiController extends FosRestController
{

    var $classEntity, $serviceEntity, $templateDirectory;

    public function getAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $offset = null == $paramFetcher->get('offset') ? 1 : $paramFetcher->get('offset');
        $limit = $paramFetcher->get('limit');
        $maxPages = ceil($this->getDoctrine()->getRepository($this->classEntity)->countAllConcerts() / $limit);
        $data = $this->container->get($this->serviceEntity)->all($offset, $limit);
        $data == null ? $view = $this->view('No concerts found.', 404) : $view = $this->view($data, 200);
        $view->setTemplate($this->templateDirectory . "apiList.html.twig")
            ->setTemplateData(['maxPages' => $maxPages,
                'thisPage' => $offset, 'theIndex' => 'api_concerts_list']);
        return $this->handleView($view);
    }

    public function showAction($id)
    {
        $data = $this->getOr404($id);
        $view = $this->view($data, 200)
            ->setTemplate($this->templateDirectory . "apiShow.html.twig");
        return $this->handleView($view);
    }

    public function deleteAction($id)
    {
        $entity = $this->getOr404($id);
        $this->container->get($this->serviceEntity)->delete($entity);
        $view = $this->view(null,204);
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
