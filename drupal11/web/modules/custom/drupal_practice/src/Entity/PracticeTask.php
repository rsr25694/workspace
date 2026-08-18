<?php

namespace Drupal\drupal_practice\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * Defines the Practice Task entity.
 *
 * @ContentEntityType(
 *   id = "practice_task",
 *   label = @Translation("Practice Task"),
 *   label_collection = @Translation("Practice Tasks"),
 *   label_singular = @Translation("practice task"),
 *   label_plural = @Translation("practice tasks"),
 *   label_count = @PluralTranslation(
 *     singular = "@count practice task",
 *     plural = "@count practice tasks",
 *   ),
 *   handlers = {
 *     "list_builder" = "Drupal\drupal_practice\PracticeTaskListBuilder",
 *     "access" = "Drupal\drupal_practice\Access\PracticeTaskAccessControlHandler",
 *     "form" = {
 *       "add" = "Drupal\drupal_practice\Form\PracticeTaskForm",
 *       "edit" = "Drupal\drupal_practice\Form\PracticeTaskForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider"
 *     }
 *   },
 *   base_table = "practice_task",
 *   admin_permission = "administer practice",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *     "label" = "title",
 *     "owner" = "uid"
 *   },
 *   links = {
 *     "canonical" = "/practice/task/{practice_task}",
 *     "add-form" = "/practice/task/add",
 *     "edit-form" = "/practice/task/{practice_task}/edit",
 *     "delete-form" = "/practice/task/{practice_task}/delete",
 *     "collection" = "/admin/content/practice-tasks"
 *   }
 * )
 */
class PracticeTask extends ContentEntityBase {

  use EntityChangedTrait;

  /**
   * Defines the base fields for the Practice Task entity.
   *
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   *   The entity type definition.
   *
   * @return array<string, \Drupal\Core\Field\BaseFieldDefinition>
   *   An array of base field definitions.
   */
  public static function baseFieldDefinitions(
    EntityTypeInterface $entity_type
  ): array {
    $fields = parent::baseFieldDefinitions($entity_type);

    // Task title.
    $fields['title'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Title'))
      ->setDescription(t('The task title.'))
      ->setRequired(TRUE)
      ->setSettings([
        'max_length' => 255,
      ])
      ->addConstraint('PracticeTaskTitle')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -10,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -10,
      ])
      ->setDisplayConfigurable('view', TRUE)
      ->setDisplayConfigurable('form', TRUE);

    // Task description.
    $fields['description'] = BaseFieldDefinition::create('text_long')
      ->setLabel(t('Description'))
      ->setDescription(t('Detailed description of the task.'))
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'text_default',
        'weight' => 0,
      ])
      ->setDisplayOptions('form', [
        'type' => 'text_textarea',
        'weight' => 0,
      ])
      ->setDisplayConfigurable('view', TRUE)
      ->setDisplayConfigurable('form', TRUE);

    // Task status.
    $fields['status'] = BaseFieldDefinition::create('list_string')
      ->setLabel(t('Status'))
      ->setDescription(t('The current status of the task.'))
      ->setRequired(TRUE)
      ->setSettings([
        'allowed_values' => [
          'todo' => 'To do',
          'in_progress' => 'In progress',
          'completed' => 'Completed',
        ],
      ])
      ->setDefaultValue('todo')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'list_default',
        'weight' => 10,
      ])
      ->setDisplayOptions('form', [
        'type' => 'options_select',
        'weight' => 10,
      ])
      ->setDisplayConfigurable('view', TRUE)
      ->setDisplayConfigurable('form', TRUE);

    // Task priority.
    $fields['priority'] = BaseFieldDefinition::create('list_string')
      ->setLabel(t('Priority'))
      ->setDescription(t('The priority of the task.'))
      ->setRequired(TRUE)
      ->setSettings([
        'allowed_values' => [
          'low' => 'Low',
          'medium' => 'Medium',
          'high' => 'High',
        ],
      ])
      ->setDefaultValue('medium')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'list_default',
        'weight' => 20,
      ])
      ->setDisplayOptions('form', [
        'type' => 'options_select',
        'weight' => 20,
      ])
      ->setDisplayConfigurable('view', TRUE)
      ->setDisplayConfigurable('form', TRUE);

    // Task owner.
    $fields['uid'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Owner'))
      ->setDescription(t('The user who owns this task.'))
      ->setSetting('target_type', 'user')
      ->setDefaultValueCallback(
        static::class . '::getDefaultOwner'
      )
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'author',
        'weight' => 30,
      ])
      ->setDisplayOptions('form', [
        'type' => 'entity_reference_autocomplete',
        'weight' => 30,
      ])
      ->setDisplayConfigurable('view', TRUE)
      ->setDisplayConfigurable('form', TRUE);

    // Creation timestamp.
    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time when the task was created.'))
      ->setReadOnly(TRUE)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'timestamp',
        'weight' => 40,
      ])
      ->setDisplayConfigurable('view', TRUE);

    // Changed timestamp.
    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time when the task was last changed.'))
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'timestamp',
        'weight' => 50,
      ])
      ->setDisplayConfigurable('view', TRUE);

    return $fields;
  }

  /**
   * Gets the default owner.
   *
   * @return array<int, int>
   *   The current user's ID.
   */
  public static function getDefaultOwner(): array {
    return [
      \Drupal::currentUser()->id(),
    ];
  }

}