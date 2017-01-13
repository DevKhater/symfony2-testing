<?php

namespace MK\UserBundle\Security\Encoder;

use Symfony\Component\Security\Core\Encoder\BasePasswordEncoder;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;

class PasswordEncoder extends BasePasswordEncoder
{

    public function encodePassword($raw, $salt)
    {
        if ($this->isPasswordTooLong($raw)) {
            throw new BadCredentialsException('Invalid password.');
        }
        return hash('sha256', $salt . $raw);
    }

    public function isPasswordValid($encoded, $raw, $salt)
    {
        if ($this->isPasswordTooLong($raw)) {
            return false;
        }
        return $encoded === $this->encodePassword($raw, $salt);
    }

}
