<?php

namespace Drupal\ipo\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Defines the IPO Symbol field type.
 *
 * @FieldType(
 *   id = "ipo_symbol",
 *   label = @Translation("IPO Symbol"),
 *   description = @Translation("Stores an IPO/company stock symbol."),
 *   category = "ipo",
 *   default_widget = "string_textfield",
 *   default_formatter = "string"
 * )
 */
class IpoSymbolItem extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(
    FieldStorageDefinitionInterface $field_definition
  ) {
    $properties = [];

    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('IPO Symbol'))
      ->setRequired(TRUE);

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(
    FieldStorageDefinitionInterface $field_definition
  ) {
    return [
      'columns' => [
        'value' => [
          'type' => 'varchar',
          'length' => 50,
          'not null' => TRUE,
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('value')->getValue();

    return $value === NULL || $value === '';
  }

}