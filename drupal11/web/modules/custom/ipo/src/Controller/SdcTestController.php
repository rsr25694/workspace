<?php

namespace Drupal\ipo\Controller;

use Drupal\Core\Controller\ControllerBase;

class SdcTestController extends ControllerBase {

  public function test(): array {
    return [
      '#type' => 'component',
      '#component' => 'paisa:card',
      '#props' => [
        'title' => 'Drupal 11e',
        'body' => 'Learning Single Directory Components4.',
        'url' => '/drupal',
      ],
    ];
  }

}
