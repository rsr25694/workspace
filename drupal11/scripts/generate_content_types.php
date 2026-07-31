<?php

use Drupal\node\Entity\NodeType;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\field\Entity\FieldConfig;

$numberOfContentTypes = 100;

$fieldTypes = [
  'string',
  'text_long',
  'boolean',
  'integer',
  'decimal',
  'email',
  'link',
  'datetime',
];

for ($i = 1; $i <= $numberOfContentTypes; $i++) {

  $machineName = 'content_' . str_pad($i, 3, '0', STR_PAD_LEFT);

  if (NodeType::load($machineName)) {
    echo "Skipping {$machineName}\n";
    continue;
  }

  NodeType::create([
    'type' => $machineName,
    'name' => 'Content Type ' . $i,
  ])->save();

  echo "Created {$machineName}\n";

  // Create 8-15 random fields.
  $fieldCount = rand(8, 15);

  for ($j = 1; $j <= $fieldCount; $j++) {

    $fieldType = $fieldTypes[array_rand($fieldTypes)];

    // Unique field name for every content type.
    $fieldName = sprintf(
      'field_%03d_%02d',
      $i,
      $j
    );

    if (!FieldStorageConfig::loadByName('node', $fieldName)) {

      $storage = [
        'field_name' => $fieldName,
        'entity_type' => 'node',
        'type' => $fieldType,
        'cardinality' => 1,
      ];

      switch ($fieldType) {

        case 'string':
          $storage['settings'] = [
            'max_length' => 255,
          ];
          break;

        case 'link':
          $storage['settings'] = [
            'link_type' => 17,
          ];
          break;

        case 'decimal':
          $storage['settings'] = [
            'precision' => 10,
            'scale' => 2,
          ];
          break;
      }

      FieldStorageConfig::create($storage)->save();
    }

    if (!FieldConfig::loadByName('node', $machineName, $fieldName)) {

      $config = [
        'field_name' => $fieldName,
        'entity_type' => 'node',
        'bundle' => $machineName,
        'label' => ucwords(str_replace('_', ' ', $fieldName)),
      ];

      switch ($fieldType) {

        case 'boolean':
          $config['settings'] = [
            'on_label' => 'Yes',
            'off_label' => 'No',
          ];
          break;

      }

      FieldConfig::create($config)->save();

      echo "   + {$fieldName} ({$fieldType})\n";
    }

  }

}

drupal_flush_all_caches();

echo "\nCompleted successfully.\n";