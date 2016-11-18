<?php
namespace MK\ApiBundle\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTEncodedEvent;

class JWTEncoderListener extends JWTEncodedEvent
{

    /**
     * @param JWTEncodedEvent $event
     */
    public function onJwtEncoded(JWTEncodedEvent $event)
    {
        $token = 'HELLLYEAAAHH';
        var_dump($event);exit;
    }

}
