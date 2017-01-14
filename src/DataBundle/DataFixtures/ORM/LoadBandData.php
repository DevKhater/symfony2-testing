<?php

namespace DataBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DataBundle\Entity\Band;

class LoadBandData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $band1 = new Band();
        $band1->setName("The Lepper");
        $band1->setGenre("Thrash Metal");
        $manager->persist($band1);
        $manager->flush();

        $band2 = new Band();
        $band2->setName("Anopios");
        $band2->setGenre("Arabic Heavy Metal");
        $manager->persist($band2);
        $manager->flush();

        $band3 = new Band();
        $band3->setName("Atlantis");
        $band3->setGenre("Progressive Metal");
        $manager->persist($band3);
        $manager->flush();

        $band4 = new Band();
        $band4->setName("Redeemers");
        $band4->setGenre("Power Metal");
        $manager->persist($band4);
        $manager->flush();

        $band5 = new Band();
        $band5->setName("Varden");
        $band5->setGenre("Symfonic Power Metal");
        $manager->persist($band5);
        $manager->flush();

        $band6 = new Band();
        $band6->setName("BarakA");
        $band6->setGenre("Arabic Rock");
        $manager->persist($band6);
        $manager->flush();

        $band7 = new Band();
        $band7->setName("KLAKET");
        $band7->setGenre("Arabic Rock");
        $manager->persist($band7);
        $manager->flush();

        $band8 = new Band();
        $band8->setName("Segadoras");
        $band8->setGenre("Death Core");
        $manager->persist($band8);
        $manager->flush();

        $band9 = new Band();
        $band9->setName("Sinprophecy");
        $band9->setGenre("Melodic Death Metal");
        $manager->persist($band9);
        $manager->flush();

        $band10 = new Band();
        $band10->setName("Procession Towards The Unknown");
        $band10->setGenre("Experimental Avant-Garde Improvisation");
        $manager->persist($band10);
        $manager->flush();

        $band11 = new Band();
        $band11->setName(" Destiny In Chains");
        $band11->setGenre("Deathcore");
        $manager->persist($band11);
        $manager->flush();

        $band12 = new Band();
        $band12->setName("Paranoid Eyes");
        $band12->setGenre("Tribute Band");
        $manager->persist($band12);
        $manager->flush();

        $band13 = new Band();
        $band13->setName("Scarab");
        $band13->setGenre("Death Metal");
        $manager->persist($band13);
        $manager->flush();

        
        $this->addReference('anop', $band2);
        $this->addReference('atla', $band3);
        $this->addReference('redeem', $band4);
        $this->addReference('varden', $band5);
        $this->addReference('baraka', $band6);
        $this->addReference('klaket', $band7);
        $this->addReference('sega', $band8);
        $this->addReference('sin', $band9);
        $this->addReference('pttu', $band10);
        $this->addReference('dic', $band11);
        $this->addReference('paranoid', $band12);
        $this->addReference('scarab', $band13);
    }

    public function getOrder()
    {
        return 1;
    }

}
