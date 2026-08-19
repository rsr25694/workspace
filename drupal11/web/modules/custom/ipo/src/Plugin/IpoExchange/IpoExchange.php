<?php

namespace Drupal\ipo\Plugin\IpoExchange;

use Drupal\Component\Plugin\PluginBase;

/**
 * @IpoExchange(
 *   id = "nse",
 *   label = @Translation("NSE")
 * )
 */
class IpoExchange extends PluginBase {

  /**
   * Returns exchange name.
   */
  public function getExchangeName(): string {
    return $this->pluginDefinition['label'];
  }

}