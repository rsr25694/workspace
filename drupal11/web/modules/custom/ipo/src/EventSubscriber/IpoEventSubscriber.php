<?php

namespace Drupal\ipo\EventSubscriber;

use Drupal\ipo\Event\UserLoginEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;

/**
 * Subscribes to IPO events.
 */
class IpoEventSubscriber implements EventSubscriberInterface {

  /**
   * React when a user logs in.
   */
  public function onUserLogin(UserLoginEvent $event): void {
    $account = $event->getAccount();

    \Drupal::messenger()->addStatus(
      'Welcome @name! You have successfully logged in.- event dispatched from ipo module',
      [
        '@name' => $account->getAccountName(),
      ]
    );
  }

  public function onRequest(RequestEvent $event): void {
    \Drupal::messenger()->addStatus(
      'Hello from IPO event subscriber! - Event Called on KernelEvents',
      []
    );
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents(): array {
    return [
      UserLoginEvent::EVENT_NAME => 'onUserLogin',
      // KernelEvents::REQUEST => 'onRequest',
    ];
  }

}
