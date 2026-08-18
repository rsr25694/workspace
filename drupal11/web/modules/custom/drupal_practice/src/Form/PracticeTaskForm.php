<?php

namespace Drupal\drupal_practice\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

final class PracticeTaskForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state): int {
    $entity = $this->getEntity();
    $is_new = $entity->isNew();

    $status = parent::save($form, $form_state);

    if ($status === SAVED_NEW) {
      $this->messenger()->addStatus(
        $this->t('Task %title has been created.', [
          '%title' => $entity->label(),
        ])
      );
    }
    else {
      $this->messenger()->addStatus(
        $this->t('Task %title has been updated.', [
          '%title' => $entity->label(),
        ])
      );
    }

    $form_state->setRedirect(
      'entity.practice_task.canonical',
      [
        'practice_task' => $entity->id(),
      ]
    );

    return $status;
  }

}