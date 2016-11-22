<?php
namespace MK\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use MK\UserBundle\Entity\User;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setUsername('a');
        $userAdmin->setPassword($this->container->get('security.password_encoder')->encodePassword($userAdmin, '1'));
        $userAdmin->setEmail('m@m.com');
        $userAdmin->setSuperAdmin(true);
        $manager->persist($userAdmin);
        $manager->flush();
        
        $user = new User();
        $user->setUsername('b');
        $user->setPassword($this->container->get('security.password_encoder')->encodePassword($userAdmin, '1'));
        $user->setEmail('b@b.com');
        $user->setSuperAdmin(true);
        $manager->persist($user);
        $manager->flush();
    }
}