<?php

namespace Drupal\ipo\Service;

final class IpoCalculator {
  public function calculate(int|float $a, int|float $b): int|float {
    return $a + $b;
  }
}
