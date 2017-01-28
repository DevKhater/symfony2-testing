<?php

namespace DataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Response;
use DataBundle\Entity\Project;
use DataBundle\Form\ProjectType;

class DefaultController extends Controller
{
    /**
     * @Route("/default", name="api_test_default")
     */
    public function indexAction(Request $request)
    {
//        $em = $this->getDoctrine()->getRepository('DataBundle:Project');
//        $pro = new Project();
//        $form = $this->createForm(new ProjectType(), $pro);
//        if ($request->isMethod("POST")) {
//            $form->handleRequest($request);
//            if ($form->isValid()) {
//                dump('Form Is Valid');
//            } else {
//                return $this->render('DataBundle:Default:new.html.twig', array(
//                            'form' => $form->createView(),
//                            'error' => $form->getErrors()));
//            }
//        }
//        return $this->render('DataBundle:Default:new.html.twig', array(
//                    'form' => $form->createView()
//        ));
        
        dump($this->get('data.project.handler')->all());
    }

}
