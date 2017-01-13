<?php

namespace MK\UserBundle\Security\Provider;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Doctrine\ORM\EntityManager;
use MK\UserBundle\Entity\User;

class UserProvider implements UserProviderInterface
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function loadUserByUsername($username)
    {
        // make a call to your webservice here
        $userData = $this->em->getRepository('MKUserBundle:User')->loadUserByUsername($username);
        // pretend it returns an array on success, false if there is no user
        if ($userData) {
            return $userData;
        }
        throw new UsernameNotFoundException(
        sprintf('Username "%s" does not exist.', $username)
        );
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(
            sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }
        return $user;
    }

    public function supportsClass($class)
    {
        return $class === 'MK\UserBundle\Entity\User';
    }
}
