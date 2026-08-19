<?php

namespace Drupal\ipo;

use Drupal\Core\Plugin\DefaultPluginManager;

class IpoExchangeManager extends DefaultPluginManager {

  public function __construct(
    \Traversable $namespaces,
    \Drupal\Core\Cache\CacheBackendInterface $cache_backend,
    \Drupal\Core\Extension\ModuleHandlerInterface $module_handler,
  ) {
    parent::__construct(
      'Plugin/IpoExchange',
      $namespaces,
      $module_handler,
      'Drupal\ipo\Plugin\IpoExchange\IpoExchange',
      'Drupal\ipo\Annotation\IpoExchange'
    );

    $this->setCacheBackend($cache_backend, 'ipo_exchange_plugins');
  }

}