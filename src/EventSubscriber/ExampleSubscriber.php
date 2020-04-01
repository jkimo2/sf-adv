<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ExampleSubscriber implements EventSubscriberInterface
{
    private $redirection = ["/toto" => "/event"];

    public static function getSubscribedEvents()
    {
        return [
           'kernel.request' => [['onReRoute', 0],['onKernelRequest',0],['onKernelRequest2',1]],
          //  'kernel.request' => ['onReRoute', 5000]
        ];
    }

    public function onReRoute(RequestEvent $event)
    {
        $routeDemand = $event->getRequest()->getPathInfo();

        if( array_key_exists($routeDemand, $this->redirection) ) {
           $url =  $this->redirection[$routeDemand];
           // dump($routeDemand);
           $event->getRequest()->attributes->set("_reroute", 'on redirige');
           //$event->getRequest()->attributes->set('_controller',"nono");

           $reply =  new redirectResponse($url, 301);
           $event->setResponse($reply);
           return;
        }

        $event->getRequest()->attributes->set("_reroute",'pas de redirection');

    }

    public function onKernelRequest(RequestEvent $event)
    {
        $event->getRequest()->attributes->set("_method",'onKernelRequest');
    }

    public function onKernelRequest2(RequestEvent $event)
    {
        $event->getRequest()->attributes->set("_method2",'onKernelRequest2');
    }
}
