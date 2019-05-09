<?php

namespace Drupal\simple_page_event\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;

class PageLoadSubscriber implements EventSubscriberInterface
{
  public static function getSubscribedEvents() {
    return ['simple_page_load' => 'logPageLoad'];
  }

  public function logPageLoad(Event $event) {
    \Drupal::logger('simple_page_event')->notice('Fired simple page load event!');
  }
}
