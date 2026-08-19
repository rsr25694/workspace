<?php

/**
 * @file
 * Post-update hooks for IPO.
 */

function ipo_post_update_add_practice_setting(&$sandbox): void {
  $config = \Drupal::configFactory()->getEditable('ipo.settings');
  if ($config->get('enabled') === NULL) {
    $config->set('enabled', TRUE)->save();
  }
}

