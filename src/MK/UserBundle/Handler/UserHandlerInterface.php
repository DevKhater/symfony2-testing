<?php
namespace MK\UserBundle\Handler;

use MK\UserBundle\Entity\User;

interface UserHandlerInterface
{
    public function loadUserByUsername($username);
    public function makeUserSuperUser(User $user);
    public function createNewUser($username, $email, $plainPassword);
    public function changeUserPassword(User $user, $plainNewPassword);
    public function changeEmail(User $user, $newEmail);
    public function deleteUser(User $user);
    
}
