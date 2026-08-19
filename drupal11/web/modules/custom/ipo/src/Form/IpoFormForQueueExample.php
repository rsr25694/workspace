<?php

namespace Drupal\ipo\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Queue\QueueFactory;
use Symfony\Component\DependencyInjection\ContainerInterface;

final class IpoFormForQueueExample extends FormBase {

  public function __construct(
    private readonly QueueFactory $queueFactory,
  ) {}

  public static function create(ContainerInterface $container): static {
    return new static(
      $container->get('queue'),
    );
  }

  public function getFormId(): string {
    return 'ipo_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state): array {

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#required' => TRUE,
    ];

    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#required' => TRUE,
    ];

    $form['ipo_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('IPO Name'),
      '#required' => TRUE,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit IPO Application'),
    ];

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state): void {

    $data = [
      'name' => $form_state->getValue('name'),
      'email' => $form_state->getValue('email'),
      'ipo_name' => $form_state->getValue('ipo_name'),
    ];

    $queue = $this->queueFactory->get('ipo_demo');
    $queue->createItem($data);

    $this->messenger()->addStatus(
      $this->t('IPO application added to queue.')
    );
  }

}