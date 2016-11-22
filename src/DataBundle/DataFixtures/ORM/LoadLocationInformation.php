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
        $loc1->setName("Sawy");
        $loc1->setAddress("Egypt, Zamalek");
        $manager->persist($loc1);
        $manager->flush();

        $loc2 = new Location();
        $loc2->setName("Black <3 ");
        $loc2->setAddress("United Kingdom, London");
        $manager->persist($loc2);
        $manager->flush();

        $loc3 = new Location();
        $loc3->setName("Darb 1718");
        $loc3->setAddress("Egypt, Old Cairo");
        $manager->persist($loc3);
        $manager->flush();

        $this->addReference('loc1', $loc1);
        $this->addReference('loc2', $loc2);
        $this->addReference('loc3', $loc3);
    }

    public function getOrder()
    {
        return 2;
    }
}
