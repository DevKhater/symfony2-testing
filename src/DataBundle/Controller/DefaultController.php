<?php

namespace DataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Response;
use DataBundle\Entity\Concert;
use DataBundle\Form\ConcertType;

class DefaultController extends Controller
{

    /**
     * @Route("/test")
     */
    public function indexAction()
    {
        $paginator = $this->getDoctrine()->getRepository('DataBundle:Concert')->find(4);
        $context = new SerializationContext();
        $context->setSerializeNull(true);
        //$context->setGroups(array('list'));
        $json = $this->container->get('jms_serializer')->serialize($paginator, 'json', $context);
        
        echo "<pre>";
        dump($json)  ;
        exit;
        return new Response($json, 200, array('application/json'));exit;
        
        return $this->render('DataBundle:Concert:newConcert.html.twig', array(
                    'form' => $form->createView()
        ));
    }

}
