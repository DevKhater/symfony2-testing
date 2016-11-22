<?php namespace DataBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DataBundle\Entity\Concert;

class LoadConcertData extends AbstractFixture implements OrderedFixtureInterface
{

    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $con1 = new Concert();
        $date = date_create('2010-02-06');
        $con1->setDate($date);
        $con1->setBand($this->getReference('band1'));
        $con1->setLocation($this->getReference('loc1'));
        $manager->persist($con1);
        $manager->flush();
        
        $con2 = new Concert();
        $date = date_create('2012-04-12');
        $con2->setDate($date);
        $con2->setBand($this->getReference('band2'));
        $con2->setLocation($this->getReference('loc2'));
        $manager->persist($con2);
        $manager->flush();
        
        $con3 = new Concert();
        $date = date_create('2013-06-01');
        $con3->setDate($date);
        $con3->setBand($this->getReference('band3'));
        $con3->setLocation($this->getReference('loc3'));
        $manager->persist($con3);
        $manager->flush();
        
        
        $con4 = new Concert();
        $date = date_create('2014-10-09');
        $con4->setDate($date);
        $con4->setBand($this->getReference('band1'));
        $con4->setLocation($this->getReference('loc2'));
        $manager->persist($con4);
        $manager->flush();
    }
    public function getOrder()
    {
        return 3;
    }
}
