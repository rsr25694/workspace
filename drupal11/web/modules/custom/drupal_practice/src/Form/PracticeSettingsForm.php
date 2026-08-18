<?php

namespace Drupal\drupal_practice\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class PracticeSettingsForm extends FormBase {

  public function getFormId(): string {
    return 'practice_settings_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state): array {
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#required' => TRUE,
      '#ajax' => [
        'callback' => '::nameAjax',
        'wrapper' => 'name-result',
        'event' => 'change',
      ],
    ];

    $form['name_result'] = [
      '#type' => 'markup',
      '#markup' => '<div id="name-result"></div>',
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
    ];

    return $form;
  }

  public function nameAjax(array &$form, FormStateInterface $form_state): array {
    $name = $form_state->getValue('name');

    $form['name_result']['#markup'] =
      '<div id="name-result">' .
      $this->t('Hello @name', ['@name' => $name]) .
      '</div>';

    return $form['name_result'];
  }

  public function submitForm(array &$form, FormStateInterface $form_state): void {
    $this->messenger()->addStatus($this->t('Saved.'));
  }

}