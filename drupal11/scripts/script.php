<?php

$workflows = \Drupal::entityTypeManager()
  ->getStorage('workflow')
  ->loadMultiple();

foreach ($workflows as $workflow) {

  $plugin = $workflow->getTypePlugin();
  $config = $plugin->getConfiguration();

  $changed = FALSE;

  if (!empty($config['transitions'])) {

    $weight = 0;

    foreach ($config['transitions'] as $id => &$transition) {

      if (!isset($transition['weight'])) {
        $transition['weight'] = $weight;
        echo "Fixed {$workflow->id()} transition {$id} => {$weight}\n";
        $changed = TRUE;
      }

      $weight++;
    }
  }

  if ($changed) {
    $plugin->setConfiguration($config);
    $workflow->save();
  }
}

echo "Done\n";