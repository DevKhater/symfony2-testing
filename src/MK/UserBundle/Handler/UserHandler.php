<?php

namespace MK\UserBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use MK\UserBundle\Handler\UserHandlerInterface;
use MK\UserBundle\Entity\User;

class UserHandler implements UserHandlerInterface
{

    private $em;
    private $entityClass;
    private $repository;
    private $passwordEncoder;

    public function __construct(ObjectManager $em, $entityClass, UserPasswordEncoder $passwordEncoder)
    {
        $this->em = $em;
        $this->entityClass = $entityClass;
        $this->repository = $this->em->getRepository($this->entityClass);
        $this->passwordEncoder = $passwordEncoder;
    }

    public function createNewUser($username, $email, $plainPassword)
    {
        $user = new $this->entityClass;
        $user->setUsername($username);
        $user->setEmail($email);
        $password = $this->passwordEncoder->encodePassword($user, $plainPassword);
        $user->setPassword($password);
        $this->save($user);
        return $this->loadUserByUsername($username);
    }

    public function loadUserByUsername($username)
    {
        return $this->em->getRepository('UserBundle:User')->loadUserByUsername($username);
    }

    public function makeUserSuperUser(User $user)
    {
        //$user = $this->loadUserByUsername($username);
        $user->setSuperAdmin(true);
        $this->save($user);
    }

    public function changeUserPassword(User $user, $plainNewPassword)
    {
        
    }

    public function changeEmail(User $user, $newEmail)
    {
        
    }

    public function deleteUser(User $user)
    {
        
    }

    private function save($user)
    {
        $this->em->persist($user);
        $this->em->flush();
        return $user;
    }

}
