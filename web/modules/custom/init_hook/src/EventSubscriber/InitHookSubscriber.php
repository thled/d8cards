<?php

namespace Drupal\init_hook\EventSubscriber;

use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Drupal\Core\Session\AccountProxyInterface;

class InitHookSubscriber implements EventSubscriberInterface
{
  /** @var AccountProxyInterface */
  private $user;

  public function __construct(AccountProxyInterface $ap)
  {
    $this->user = $ap;
  }

  static function getSubscribedEvents()
  {
    $events[KernelEvents::RESPONSE][] = ['addAccessAllowOriginHeaders'];

    return $events;
  }

  public function addAccessAllowOriginHeaders(FilterResponseEvent $event)
  {
    if ($this->user->isAnonymous()) {
      $response = $event->getResponse();
      $response->headers->set('Access-Control-Allow-Origin', '*');
    }
  }
}
