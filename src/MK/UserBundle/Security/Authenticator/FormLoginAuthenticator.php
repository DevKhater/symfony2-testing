<?php

namespace MK\UserBundle\Security\Authenticator;

use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;

class FormLoginAuthenticator extends AbstractFormLoginAuthenticator
{

    private $container;
    private $userProvider;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->userProvider = $this->container->get('mk.user.provider');
    }

    public function getCredentials(Request $request)
    {
        if ($request->get('_route') != 'login_check') {
            return;
        }
        $username = $request->request->get('_username');
        $password = $request->request->get('_password');

        return array(
            'username' => $username,
            'password' => $password
        );
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $username = $credentials['username'];
        return $this->userProvider->loadUserByUsername($username);
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        $plainPassword = $credentials['password'];
        $encoder = $this->container->get('security.password_encoder');
        $check = $encoder->isPasswordValid($user, $plainPassword, $user->getSalt());
        if (!$encoder->isPasswordValid($user, $plainPassword)) {
            throw new BadCredentialsException();
        }
        return $check;
    }

    public function supportsRememberMe()
    {
        return true;
    }

    protected function getLoginUrl()
    {
        return $this->container->get('router')->generate('secure_login');
    }

    protected function getDefaultSuccessRedirectUrl()
    {
        return $this->container->get('router')->generate('homepage');
    }
}
