<?php

namespace Drupal\ipo\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class IpoEventSubscriber implements EventSubscriberInterface {

  /**
   * React when a request is received.
   */
  public function onRequest(RequestEvent $event): void {
    // \Drupal::messenger()->addStatus(
    //   'Hello from IPO event subscriber!'
    // );
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents(): array {
    return [
      KernelEvents::REQUEST => 'onRequest',
    ];
  }

}