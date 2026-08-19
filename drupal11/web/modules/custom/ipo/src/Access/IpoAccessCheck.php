<?php

namespace Drupal\ipo\Access;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;

final class IpoAccessCheck {
  public function __construct(private readonly AccountInterface $currentUser) {}

  public function access(): AccessResult {
    return AccessResult::allowedIfHasPermission($this->currentUser, 'administer ipo settings')
      ->cachePerPermissions();
  }
}
