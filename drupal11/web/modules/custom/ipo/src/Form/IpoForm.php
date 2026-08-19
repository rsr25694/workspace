<?php

namespace Drupal\ipo\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

final class IpoForm extends ConfigFormBase {
  public function getFormId(): string {
    return 'ipo_form';
  }

  protected function getEditableConfigNames(): array {
    return ['ipo.settings'];
  }

  public function buildForm(array $form, FormStateInterface $form_state): array {
    $config = $this->config('ipo.settings');
    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Practice title'),
      '#default_value' => $config->get('title') ?? 'IPO',
      '#required' => TRUE,
    ];
    $form['enabled'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enabled'),
      '#default_value' => $config->get('enabled') ?? TRUE,
    ];
    return parent::buildForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state): void {
    $this->configFactory->getEditable('ipo.settings')
      ->set('title', $form_state->getValue('title'))
      ->set('enabled', (bool) $form_state->getValue('enabled'))
      ->save();
    parent::submitForm($form, $form_state);
  }
}
