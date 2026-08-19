<?php

namespace Drupal\ipo\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;

/**
 * Provides an IPO practice block.
 *
 * @Block(
 *   id = "ipo_practice_block",
 *   admin_label = @Translation("IPO Practice Block"),
 *   category = @Translation("IPO")
 * )
 */
final class IpoPracticeBlock extends BlockBase {
  public function build(): array {
    return [
      '#markup' => $this->t('IPO plugin block: @time', ['@time' => date('c')]),
      '#cache' => [
        'contexts' => ['user.roles'],
        'tags' => ['ipo:block'],
        'max-age' => 60,
      ],
    ];
  }

  public function getCacheTags(): array {
    return Cache::mergeTags(parent::getCacheTags(), ['ipo:block']);
  }
}
