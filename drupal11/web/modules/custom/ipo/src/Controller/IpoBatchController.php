<?php

namespace Drupal\ipo\Controller;

use Drupal\Core\Batch\BatchBuilder;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;
use Symfony\Component\HttpFoundation\RedirectResponse;

final class IpoBatchController extends ControllerBase {
  public function run(): RedirectResponse {
    $batch = (new BatchBuilder())
      ->setTitle($this->t('Processing IPO batch'))
      ->setInitMessage($this->t('Starting...'))
      ->setProgressMessage($this->t('Processed @current of @total.'))
      ->setErrorMessage($this->t('Batch encountered an error.'))
      ->addOperation([self::class, 'batchOperation'], [range(1, 5)])
      ->setFinishCallback([self::class, 'batchFinished'])
      ->toArray();

    batch_set($batch);
    return new RedirectResponse(Url::fromRoute('ipo.dashboard')->toString());
  }

  public static function batchOperation(array $items, array &$context): void {
    $context['results']['processed'] = ($context['results']['processed'] ?? 0) + count($items);
  }

  public static function batchFinished(bool $success, array $results, array $operations): void {}
}
