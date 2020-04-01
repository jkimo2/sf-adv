<?php


namespace App\EventListener;


use Symfony\Component\HttpKernel\Event\RequestEvent;

class AddAttributeEventListener
{
    public function addRequestAttributes(RequestEvent $requestEvent)
    {
        //dump($requestEvent);
        $requestEvent->getRequest()->attributes->set('default_user', 'jojo');
    }
}