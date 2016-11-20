<?php

namespace DataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use DataBundle\Entity\Concert;
use DataBundle\Form\ConcertType;

class CRUDConcertController extends Controller
{

    /**
     * @Route("/concerts/all/{page}/{limit}", name="data_concertcrud_index")
     */
    public function indexAction($page = 1, $limit = 10)
    {
        $paginator = $this->getDoctrine()->getRepository('DataBundle:Concert')->findAllConcerts($page, $limit);
        $counts = $this->getDoctrine()->getRepository('DataBundle:Concert')->countAllConcerts();
        $maxPages = ceil($counts / $limit);
        $thisPage = $page;
        return $this->render('DataBundle:Concert:index.html.twig', array(
                    'concerts' => $paginator,
                    'maxPages' => $maxPages,
                    'thisPage' => $thisPage
        ));
    }

    /**
     * @Route("/concerts/{id}", name="data_concertcrud_show")
     */
    public function showAction(Request $request)
    {
        $concert = $this->getOr404($request->get('id'));
        return $this->render('DataBundle:Concert:show.html.twig', array('data' => $concert));
    }

    /**
     * @Route("/concert/new", name="data_concertcrud_new")
     */
    public function newAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')) {
            throw $this->createAccessDeniedException('You cannot access this page!');
        }

        $concert = new Concert();
        $form = $this->createForm(new ConcertType(), $concert);
        if ($request->isMethod("POST")) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $newConcert = $this->save($form->getData());
                return $this->redirect($this->generateUrl('data_concertcrud_show', array('id' => $newConcert->getId())));
            } else {
                return $this->render('DataBundle:Concert:new.html.twig', array(
                            'form' => $form->createView(),
                            'error' => $form->getErrors()));
            }
        }
        return $this->render('DataBundle:Concert:new.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    /**
     * @Route("/concert/edit/{id}", name="data_concertcrud_edit")
     */
    public function editAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')) {
            throw $this->createAccessDeniedException('You cannot access this page!');
        }

        $concert = $this->getOr404($request->get('id'));
        $form = $this->createForm(new ConcertType(), $concert);
        if ($request->isMethod("POST")) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $concert = $this->save($form->getData());
                return $this->redirect($this->generateUrl('data_concertcrud_show', array('id' => $concert->getId())));
            } else {
                dump($form->getErrors());
                exit;
                return $this->render('DataBundle:Concert:edit.html.twig', array(
                            'name' => $request->get('id'),
                            'form' => $form->createView(),
                            'error' => $form->getErrors()));
            }
        }
        return $this->render('DataBundle:Concert:edit.html.twig', array(
                    'form' => $form->createView(),
                    'name' => $request->get('id')
        ));
    }

    /**
     * @Route("/concert/delete/{id}", name="data_concertcrud_delete")
     */
    public function deleteAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')) {
            throw $this->createAccessDeniedException('You cannot access this page!');
        }
        if ($concert = $this->getOr404($request->get('id'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($concert);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('data_concertcrud_index'));
    }

    private function save(Concert $concert)
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($concert);
        $em->flush($concert);
        return $concert;
    }

    protected function getOr404($id)
    {
        $concert = $this->getDoctrine()->getRepository('DataBundle:Concert')->find($id);

        if (!$concert) {
            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.', $id));
        }
        return $concert;
    }

}
