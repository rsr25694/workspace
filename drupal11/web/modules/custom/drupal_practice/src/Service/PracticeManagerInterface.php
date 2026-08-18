<?php

namespace Drupal\drupal_practice\Service;

interface PracticeManagerInterface {

  /**
   * Returns dashboard statistics.
   *
   * @return array
   *   Dashboard statistics.
   */
  public function getDashboardStatistics(): array;

}