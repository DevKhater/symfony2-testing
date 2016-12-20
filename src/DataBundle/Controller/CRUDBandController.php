<?php

namespace DataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use DataBundle\Entity\Band;
use DataBundle\Form\BandType;
use DataBundle\Form\UpdateBandType;

class CRUDBandController extends Controller
{

    /**
     * @Route("/bands/all/{offset}/{limit}", name="data_bandcrud_index")
     */
    public function indexAction($offset = 1, $limit = 10)
    {
        $paginator = $this->getDoctrine()->getRepository('DataBundle:Band')->findAllEntities($offset, $limit);
        $counts = $this->getDoctrine()->getRepository('DataBundle:Band')->countAllEntities();
        $maxPages = ceil($counts / $limit);
        $thisPage = $offset;
        return $this->render('DataBundle:Band:index.html.twig', array(
                    'bands' => $paginator,
                    'maxPages' => $maxPages,
                    'thisPage' => $thisPage,
                    'theIndex' => 'data_bandcrud_index'
        ));
    }

    /**
     * @Route("/bands/{slug}", name="data_bandcrud_show")
     */
    public function showAction(Request $request)
    {
        $band = $this->getOr404($request->get('slug'));
        return $this->render('DataBundle:Band:show.html.twig', array('data' => $band));
    }

    /**
     * @Route("/band/new", name="data_bandcrud_new")
     */
    public function newAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')) {
            throw $this->createAccessDeniedException('You cannot access this page!');
        }

        $band = new Band();
        $form = $this->createForm(new BandType(), $band);
        if ($request->isMethod("POST")) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $newBand = $this->save($form->getData());
                return $this->redirect($this->generateUrl('data_bandcrud_show', array('slug' => $newBand->getSlug())));
            } else {
                return $this->render('DataBundle:Band:new.html.twig', array(
                            'form' => $form->createView(),
                            'error' => $form->getErrors()));
            }
        }
        return $this->render('DataBundle:Band:new.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    /**
     * @Route("/band/edit/{slug}", name="data_bandcrud_edit")
     */
    public function editAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')) {
            throw $this->createAccessDeniedException('You cannot access this page!');
        }

        $band = $this->getOr404($request->get('slug'));
        $form = $this->createForm(new UpdateBandType(), $band);
        if ($request->isMethod("POST")) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $band = $this->save($form->getData());
                return $this->redirect($this->generateUrl('data_bandcrud_show', array('slug' => $band->getSlug())));
            } else {
                dump($form->getErrors());
                exit;
                return $this->render('DataBundle:Band:edit.html.twig', array(
                            'name' => $request->get('slug'),
                            'form' => $form->createView(),
                            'error' => $form->getErrors()));
            }
        }
        return $this->render('DataBundle:Band:edit.html.twig', array(
                    'form' => $form->createView(),
                    'name' => $request->get('slug')
        ));
    }

    /**
     * @Route("/band/delete/{slug}", name="data_bandcrud_delete")
     */
    public function deleteAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')) {
            throw $this->createAccessDeniedException('You cannot access this page!');
        }
        if ($band = $this->getOr404($request->get('slug'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($band);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('data_bandcrud_index'));
    }

    private function save(Band $band)
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($band);
        $em->flush($band);
        return $band;
    }

    protected function getOr404($slug)
    {
        $band = $this->getDoctrine()->getRepository('DataBundle:Band')->findOneBy(array('slug' => $slug));

        if (!$band) {
            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.', $slug));
        }
        return $band;
    }

}
