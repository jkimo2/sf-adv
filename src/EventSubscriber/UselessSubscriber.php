<?php

namespace App\EventSubscriber;

use App\Event\UselessEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UselessSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return [
            'useless.nothing' => 'onUselessNothing',
        ];
    }

    public function onUselessNothing(UselessEvent $event)
    {
        dump($event);
        $html = <<<OEF
<strong class="text-primary">{$event->getValue()}</strong>
OEF;
        $event->setValue($html);
    }
}
