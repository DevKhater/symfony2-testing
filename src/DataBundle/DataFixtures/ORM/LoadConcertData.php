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
//        $con1 = new Concert();
//        $date = date_create('2010-02-06');
//        $con1->setDate($date);
//        $con1->setBand($this->getReference('band1'));
//        $con1->setLocation($this->getReference('loc1'));
//        $manager->persist($con1);
//        $manager->flush();
        
    }
    public function getOrder()
    {
        return 3;
    }
}
