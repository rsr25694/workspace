<?php

namespace Drupal\ipo\Event;

use Drupal\Component\EventDispatcher\Event;
use Drupal\user\UserInterface;

/**
 * Event that is fired when a user logs in.
 */
class UserLoginEvent extends Event {

  /**
   * The event name.
   */
  public const EVENT_NAME = 'ipo.user_login';

  /**
   * The logged-in user account.
   */
  public UserInterface $account;

  /**
   * Constructs the UserLoginEvent.
   */
  public function __construct(UserInterface $account) {
    $this->account = $account;
  }

  /**
   * Gets the logged-in user account.
   */
  public function getAccount(): UserInterface {
    return $this->account;
  }

}