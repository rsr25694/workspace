<?php

namespace Drupal\ipo\Service;

use Drupal\Core\Queue\QueueFactory;

final class IpoQueueManager {
  public function __construct(private readonly QueueFactory $queueFactory) {}

  public function createCronItem(): void {
    $queue = $this->queueFactory->get('ipo_demo');
    $queue->createItem([
      'created' => time(),
      'message' => 'Created by IPO cron demonstration.',
    ]);
  }
}
