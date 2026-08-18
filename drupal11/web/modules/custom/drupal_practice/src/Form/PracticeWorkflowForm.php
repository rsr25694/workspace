<?php

namespace Drupal\drupal_practice\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

final class PracticeWorkflowForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(
    array $form,
    FormStateInterface $form_state
  ): array {

    $form = parent::form($form, $form_state);

    $workflow = $this->entity;

    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Workflow name'),
      '#default_value' => $workflow->label(),
      '#required' => TRUE,
      '#maxlength' => 255,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#title' => $this->t('Machine name'),
      '#default_value' => $workflow->id(),
      '#machine_name' => [
        'exists' => '\Drupal\drupal_practice\Entity\PracticeWorkflow::load',
      ],
      '#disabled' => !$workflow->isNew(),
      '#required' => TRUE,
    ];

    $form['description'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Description'),
      '#default_value' => $workflow->getDescription(),
    ];

    $form['status'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enabled'),
      '#default_value' => $workflow->status(),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(
    array $form,
    FormStateInterface $form_state
  ): int {

    $workflow = $this->entity;

    $status = $workflow->save();

    $message = $status === SAVED_NEW
      ? $this->t('Workflow created.')
      : $this->t('Workflow updated.');

    $this->messenger()->addStatus($message);

    $form_state->setRedirect(
      'entity.practice_workflow.collection'
    );

    return $status;
  }

}