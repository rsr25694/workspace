<?php

namespace Drupal\ipo\EventSubscriber;

use Drupal\Core\Routing\RouteBuildEvent;
use Drupal\Core\Routing\RoutingEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class IpoEventSubscriber implements EventSubscriberInterface {
  public static function getSubscribedEvents(): array {
    return [
      RoutingEvents::ALTER => 'onRouteAlter',
    ];
  }

  public function onRouteAlter(RouteBuildEvent $event): void {
    // Practice point: route alteration happens during route rebuilding.
  }
}
