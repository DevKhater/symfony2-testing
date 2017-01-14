<?php namespace DataBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DataBundle\Entity\Location;

class LoadLocationData  extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $loc1 = new Location();
        $loc1->setName("Sawy Culture Wheel");
        $loc1->setAddress("Egypt, Cairo, Zamalek");
        $manager->persist($loc1);
        $manager->flush();

        $loc2 = new Location();
        $loc2->setName("Family Land");
        $loc2->setAddress("Egypt, Cairo, Maadi");
        $manager->persist($loc2);
        $manager->flush();
        
        $loc3 = new Location();
        $loc3->setName("Canadian International College");
        $loc3->setAddress("Egypt, New Cairo, Fifth Settlement");
        $manager->persist($loc3);
        $manager->flush();

        $loc4 = new Location();
        $loc4->setName("Alexandria Bibliotheca");
        $loc4->setAddress("Egypt, Alexandria");
        $manager->persist($loc4);
        $manager->flush();
        
        $loc5 = new Location();
        $loc5->setName("Jesuit School");
        $loc5->setAddress("Egypt, Alexandria");
        $manager->persist($loc5);
        $manager->flush();
        
        $loc6 = new Location();
        $loc6->setName("Jesuit School");
        $loc6->setAddress("Egypt, Cairo");
        $manager->persist($loc6);
        $manager->flush();

        $loc7 = new Location();
        $loc7->setName("J W Mariott");
        $loc7->setAddress("Egypt, Cairo");
        $manager->persist($loc7);
        $manager->flush();

        $loc8 = new Location();
        $loc8->setName("Beit el Zehemy");
        $loc8->setAddress("Egypt, Old Cairo");
        $manager->persist($loc8);
        $manager->flush();

        $loc9 = new Location();
        $loc9->setName("El Ayem Theater");
        $loc9->setAddress("Egypt, Cairo - Manial");
        $manager->persist($loc9);
        $manager->flush();

        $loc10 = new Location();
        $loc10->setName("Muppet Theater");
        $loc10->setAddress("Egypt, Cairo - Attaba");
        $manager->persist($loc10);
        $manager->flush();

//        $loc11DUMMMY = new Location();
//        $loc11->setName("");
//        $loc11->setAddress("");
//        $manager->persist($loc11);
//        $manager->flush();

    }

    public function getOrder()
    {
        return 2;
    }
}
