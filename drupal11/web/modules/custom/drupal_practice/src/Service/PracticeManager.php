<?php

namespace Drupal\drupal_practice\Service;

final class PracticeManager implements PracticeManagerInterface {

  /**
   * {@inheritdoc}
   */
  public function getDashboardStatistics(): array {
    return [
      'tasks' => 0,
      'completed' => 0,
      'pending' => 0,
    ];
  }

}