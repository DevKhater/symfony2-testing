<?php

namespace DataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use JMS\Serializer\SerializationContext;
use Symfony\Component\BrowserKit\Response;
use DataBundle\Entity\Concert;
use DataBundle\Form\ConcertType;

class DefaultController extends Controller
{

    /**
     * @Route("/test")
     */
    public function indexAction()
    {
        $paginator = $this->getDoctrine()->getRepository('DataBundle:Band')->find(24);
        foreach ($paginator->getConcerts() as $concert) {
            dump($concert);
            $context = new SerializationContext();
            $context->setSerializeNull(true);
            dump($this->container->get('jms_serializer')->serialize($concert, 'json', $context));
        }
        $context = new SerializationContext();
        $context->setSerializeNull(true);
        dump($this->container->get('jms_serializer')->serialize($paginator->getConcerts(), 'json', $context));

        exit;
        return $this->render('DataBundle:Concert:newConcert.html.twig', array(
                    'form' => $form->createView()
        ));
    }

}
