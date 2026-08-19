<?php

namespace Drupal\ipo\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

final class IpoAjaxForm extends FormBase {
  public function getFormId(): string {
    return 'ipo_ajax_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state): array {
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#required' => TRUE,
    ];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Say hello'),
      '#ajax' => [
        'callback' => '::ajaxSubmit',
        'wrapper' => 'ipo-ajax-result',
      ],
    ];
    $form['result'] = [
      '#type' => 'container',
      '#attributes' => ['id' => 'ipo-ajax-result'],
      '#markup' => $this->t('Enter a name.'),
    ];
    return $form;
  }

  public function ajaxSubmit(array &$form, FormStateInterface $form_state): AjaxResponse {
    $response = new AjaxResponse();
    $name = $form_state->getValue('name');
    $response->addCommand(new ReplaceCommand('#ipo-ajax-result', [
      '#type' => 'container',
      '#attributes' => ['id' => 'ipo-ajax-result'],
      '#markup' => $this->t('Hello @name!', ['@name' => $name]),
    ]));
    return $response;
  }

  public function submitForm(array &$form, FormStateInterface $form_state): void {}
}
