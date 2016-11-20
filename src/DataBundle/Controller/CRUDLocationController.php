<?php

namespace DataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use DataBundle\Entity\Location;
use DataBundle\Form\LocationType;

class CRUDLocationController extends Controller
{

    /**
     * @Route("/locations/all/{page}/{limit}", name="data_locationcrud_index")
     */
    public function indexAction($page = 1, $limit = 10)
    {
        $paginator = $this->getDoctrine()->getRepository('DataBundle:Location')->findAllLocations($page, $limit);
        $counts = $this->getDoctrine()->getRepository('DataBundle:Location')->countAllLocations();
        $maxPages = ceil($counts / $limit);
        $thisPage = $page;
        return $this->render('DataBundle:Location:index.html.twig', array(
                    'locations' => $paginator,
                    'maxPages' => $maxPages,
                    'thisPage' => $thisPage
        ));
    }

    /**
     * @Route("/locations/{id}", name="data_locationcrud_show")
     */
    public function showAction(Request $request)
    {
        $location = $this->getOr404($request->get('id'));
        return $this->render('DataBundle:Location:show.html.twig', array('data' => $location));
    }

    /**
     * @Route("/location/new", name="data_locationcrud_new")
     */
    public function newAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')) {
            throw $this->createAccessDeniedException('You cannot access this page!');
        }

        $location = new Location();
        $form = $this->createForm(new LocationType(), $location);
        if ($request->isMethod("POST")) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $newLocation = $this->save($form->getData());
                return $this->redirect($this->generateUrl('data_locationcrud_show', array('id' => $newLocation->getId())));
            } else {
                return $this->render('DataBundle:Location:new.html.twig', array(
                            'form' => $form->createView(),
                            'error' => $form->getErrors()));
            }
        }
        return $this->render('DataBundle:Location:new.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    /**
     * @Route("/location/edit/{id}", name="data_locationcrud_edit")
     */
    public function editAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')) {
            throw $this->createAccessDeniedException('You cannot access this page!');
        }

        $location = $this->getOr404($request->get('id'));
        $form = $this->createForm(new LocationType(), $location);
        if ($request->isMethod("POST")) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $location = $this->save($form->getData());
                return $this->redirect($this->generateUrl('data_locationcrud_show', array('id' => $location->getId())));
            } else {
                dump($form->getErrors());
                exit;
                return $this->render('DataBundle:Location:edit.html.twig', array(
                            'name' => $request->get('id'),
                            'form' => $form->createView(),
                            'error' => $form->getErrors()));
            }
        }
        return $this->render('DataBundle:Location:edit.html.twig', array(
                    'form' => $form->createView(),
                    'name' => $request->get('id')
        ));
    }

    /**
     * @Route("/location/delete/{id}", name="data_locationcrud_delete")
     */
    public function deleteAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')) {
            throw $this->createAccessDeniedException('You cannot access this page!');
        }
        if ($location = $this->getOr404($request->get('id'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($location);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('data_locationcrud_index'));
    }

    private function save(Location $location)
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($location);
        $em->flush($location);
        return $location;
    }

    protected function getOr404($id)
    {
        $location = $this->getDoctrine()->getRepository('DataBundle:Location')->find($id);

        if (!$location) {
            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.', $id));
        }
        return $location;
    }

}
