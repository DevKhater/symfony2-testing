<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use DataBundle\Entity\Category;

class DefaultController extends Controller
{
    
    /**
     * @Route("/testoo", name="testing_home")
     * 
     * @param Request $request
     * @return type
     */
    public function indexAction(Request $request)
    {
        
        $catMan = $this->container->get('data.category.handler');
       // $catMan->deleteCategory(1);
        dump($catMan->getCategoryList());
        //dump($this->getDoctrine()->getRepository('DataBundle:Category')->getAllCategory());
        
        exit;
        
//        $cat = new Category();
//        $cat->setName('Category 1');
//        $cat->setParent(0);
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($cat);
//        $em->flush($cat);
//        
//        
//        $cat1 = new Category();
//        $cat1->setName('Sub Category 1');
//        $cat1->setParent(1);
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($cat1);
//        $em->flush($cat1);
//        
//        $cat2 = new Category();
//        $cat2->setName('Sub 2 Category 1');
//        $cat2->setParent(1);
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($cat2);
//        $em->flush($cat2);
//        
//        $cat3 = new Category();
//        $cat3->setName('Category 2');
//        $cat3->setParent(0);
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($cat3);
//        $em->flush($cat3);
//        
//        $cat4 = new Category();
//        $cat4->setName('Sub 4 Category 1');
//        $cat4->setParent(4);
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($cat4);
//        $em->flush($cat4);
//        
//        dump($this->getDoctrine()->getRepository('DataBundle:Category')->findAll());exit;
        
    }
}
