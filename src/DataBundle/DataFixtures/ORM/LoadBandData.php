<?php namespace DataBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DataBundle\Entity\Band;

class LoadBandData  extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $band1 = new Band();
        $band1->setName("Band Numbe 1");
        $band1->setGenre("Genre 1");
        $manager->persist($band1);
        $manager->flush();

        $band2 = new Band();
        $band2->setName("Band Numbe 2");
        $band2->setGenre("Genre 2");
        $manager->persist($band2);
        $manager->flush();

        $band3 = new Band();
        $band3->setName("Band Numbe 3");
        $band3->setGenre("Genre 3");
        $manager->persist($band3);
        $manager->flush();

        $band4 = new Band();
        $band4->setName("Band Numbe 4");
        $band4->setGenre("Genre 4");
        $manager->persist($band4);
        $manager->flush();

        $band5 = new Band();
        $band5->setName("Band Numbe 5");
        $band5->setGenre("Genre 5");
        $manager->persist($band5);
        $manager->flush();
        
        $this->addReference('band1', $band1);
        $this->addReference('band2', $band2);
        $this->addReference('band3', $band3);
    }

    public function getOrder()
    {
        return 1;
    }
}
