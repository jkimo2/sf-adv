<?php


namespace App\Service;


use App\Event\UselessEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class Useless
{
    //Afin de parametrer ce service on va utiliser un dispatcher
    private $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function nothing($value)
    {
        $event = new UselessEvent($value);
        $this->dispatcher->dispatch($event,UselessEvent::NAME);
        return $event->getValue();
    }
}