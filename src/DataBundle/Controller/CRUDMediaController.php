<?php

namespace DataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use DataBundle\Entity\Media;
use DataBundle\Form\MediaType;

class CRUDMediaController extends Controller
{

    public function indexAction($offset = 1, $limit = 10)
    {
        $paginator = $this->getDoctrine()->getRepository('DataBundle:Media')->findAllEntities($offset, $limit);
        $counts = $this->getDoctrine()->getRepository('DataBundle:Media')->countAllEntities();
        $maxPages = ceil($counts / $limit);
        $thisPage = $offset;
        return $this->render('DataBundle:Media:index.html.twig', array(
                    'media' => $paginator,
                    'maxPages' => $maxPages,
                    'thisPage' => $thisPage,
                    'theIndex' => 'data_mediacrud_index'
        ));
    }

    public function showAction(Request $request)
    {
        $location = $this->getOr404($request->get('id'));
        return $this->render('DataBundle:Media:show.html.twig', array('data' => $location));
    }

    public function newAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')) {
            throw $this->createAccessDeniedException('You cannot access this page!');
        }

        $media = new Media();
        $form = $this->createForm(new MediaType(), $media);
        if ($request->isMethod("POST")) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $fileName = $this->get('mkcrud.file.uploader')->upload($media->getImage());
                $media->setImage($fileName);
                $newMedia = $this->save($form->getData());
                return $this->redirect($this->generateUrl('data_mediacrud_show', array('id' => $newMedia->getId())));
            } else {
                return $this->render('DataBundle:Media:new.html.twig', array(
                            'form' => $form->createView(),
                            'error' => $form->getErrors()));
            }
        }
        return $this->render('DataBundle:Media:new.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    public function editAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')) {
            throw $this->createAccessDeniedException('You cannot access this page!');
        }

        $location = $this->getOr404($request->get('id'));
        $form = $this->createForm(new MediaType(), $location);
        if ($request->isMethod("POST")) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $location = $this->save($form->getData());
                return $this->redirect($this->generateUrl('data_mediacrud_show', array('id' => $location->getId())));
            } else {
                dump($form->getErrors());
                exit;
                return $this->render('DataBundle:Media:edit.html.twig', array(
                            'name' => $request->get('id'),
                            'form' => $form->createView(),
                            'error' => $form->getErrors()));
            }
        }
        return $this->render('DataBundle:Media:edit.html.twig', array(
                    'form' => $form->createView(),
                    'name' => $request->get('id')
        ));
    }

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
        return $this->redirect($this->generateUrl('data_mediacrud_index'));
    }

    private function save(Media $location)
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($location);
        $em->flush($location);
        return $location;
    }

    protected function getOr404($id)
    {
        $location = $this->getDoctrine()->getRepository('DataBundle:Media')->find($id);

        if (!$location) {
            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.', $id));
        }
        return $location;
    }

}
