<?php

use Drupal\rest\Entity\RestResourceConfig;

$manager = \Drupal::service('plugin.manager.rest');

$definitions = $manager->getDefinitions();

if (empty($definitions)) {
  echo "No REST plugins found.\n";
  exit;
}

foreach ($definitions as $plugin_id => $definition) {

  $config_id = 'rest.' . $plugin_id;

  if (RestResourceConfig::load($config_id)) {
    echo "Skipping existing: {$plugin_id}\n";
    continue;
  }

  try {

    $resource = RestResourceConfig::create([
      'id' => $plugin_id,
      'plugin_id' => $plugin_id,
      'granularity' => 'resource',
      'configuration' => [
        'methods' => [
          'GET',
          'POST',
          'PATCH',
          'DELETE',
        ],
        'formats' => [
          'json',
        ],
        'authentication' => [
          'basic_auth',
        ],
      ],
      'status' => TRUE,
    ]);

    $resource->save();

    echo "Enabled REST resource: {$plugin_id}\n";

  }
  catch (\Exception $e) {

    echo "Failed {$plugin_id}: " . $e->getMessage() . "\n";

  }

}

drupal_flush_all_caches();

echo "\nREST resources processing completed.\n";