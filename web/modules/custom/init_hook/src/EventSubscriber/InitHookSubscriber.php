<?php

namespace Drupal\init_hook\EventSubscriber;

use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class InitHookSubscriber implements EventSubscriberInterface
{
  static function getSubscribedEvents()
  {
    $events[KernelEvents::RESPONSE][] = ['addAccessAllowOriginHeaders'];

    return $events;
  }

  public function addAccessAllowOriginHeaders(FilterResponseEvent $event) {
    $response = $event->getResponse();
    $response->headers->set('Access-Control-Allow-Origin', '*');
  }
}
