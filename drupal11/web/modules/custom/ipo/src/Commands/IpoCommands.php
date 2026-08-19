<?php

namespace Drupal\ipo\Commands;

use Drush\Commands\DrushCommands;

final class IpoCommands extends DrushCommands {
  /**
   * Returns a simple practice message.
   *
   * @command ipo:hello
   * @aliases ipo-hi
   */
  public function hello(): string {
    return 'Hello from IPO Drupal 11.';
  }
}
