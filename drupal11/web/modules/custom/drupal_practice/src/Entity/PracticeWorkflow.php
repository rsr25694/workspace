<?php

namespace Drupal\drupal_practice\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Practice Workflow configuration entity.
 *
 * @ConfigEntityType(
 *   id = "practice_workflow",
 *   label = @Translation("Practice Workflow"),
 *   label_collection = @Translation("Practice Workflows"),
 *   label_singular = @Translation("practice workflow"),
 *   label_plural = @Translation("practice workflows"),
 *   handlers = {
 *     "list_builder" = "Drupal\drupal_practice\PracticeWorkflowListBuilder",
 *     "form" = {
 *       "add" = "Drupal\drupal_practice\Form\PracticeWorkflowForm",
 *       "edit" = "Drupal\drupal_practice\Form\PracticeWorkflowForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider"
 *     }
 *   },
 *   config_prefix = "practice_workflow",
 *   admin_permission = "administer practice",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "collection" = "/admin/config/practice/workflows",
 *     "add-form" = "/admin/config/practice/workflows/add",
 *     "edit-form" = "/admin/config/practice/workflows/{practice_workflow}/edit",
 *     "delete-form" = "/admin/config/practice/workflows/{practice_workflow}/delete"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "description",
 *     "status"
 *   }
 * )
 */
class PracticeWorkflow extends ConfigEntityBase {

  /**
   * The workflow label.
   *
   * @var string
   */
  protected $label;

  /**
   * Workflow description.
   *
   * @var string
   */
  protected $description = '';

  /**
   * Workflow status.
   *
   * @var bool
   */
  protected $status = TRUE;

  /**
   * Gets the workflow description.
   */
  public function getDescription(): string {
    return $this->description;
  }

  /**
   * Sets the workflow description.
   */
  public function setDescription(string $description): static {
    $this->description = $description;

    return $this;
  }

}