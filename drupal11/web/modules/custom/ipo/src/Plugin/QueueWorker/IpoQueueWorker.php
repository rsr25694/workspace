<?php

namespace Drupal\ipo\Plugin\QueueWorker;

use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Queue\QueueWorkerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Processes IPO queue items.
 *
 * @QueueWorker(
 *   id = "ipo_demo",
 *   title = @Translation("IPO demo queue"),
 *   cron = {"time" = 30}
 * )
 */
final class IpoQueueWorker extends QueueWorkerBase implements ContainerFactoryPluginInterface {

  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    private readonly LoggerChannelFactoryInterface $loggerFactory,
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
  }

  public static function create(
    ContainerInterface $container,
    array $configuration,
    $plugin_id,
    $plugin_definition
  ): static {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('logger.factory'),
    );
  }

  public function processItem($data): void {

    $name = $data['name'] ?? 'Unknown';
    $email = $data['email'] ?? 'Unknown';
    $ipo_name = $data['ipo_name'] ?? 'Unknown';

    $this->loggerFactory
      ->get('ipo')
      ->notice(
        'IPO application processed. Name: @name, Email: @email, IPO: @ipo',
        [
          '@name' => $name,
          '@email' => $email,
          '@ipo' => $ipo_name,
        ]
      );
  }

}