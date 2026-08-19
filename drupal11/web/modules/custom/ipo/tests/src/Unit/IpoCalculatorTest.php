<?php

namespace Drupal\Tests\ipo\Unit;

use Drupal\ipo\Service\IpoCalculator;
use Drupal\Tests\UnitTestCase;

/**
 * @group ipo
 */
final class IpoCalculatorTest extends UnitTestCase {
  public function testCalculate(): void {
    $calculator = new IpoCalculator();
    $this->assertSame(30, $calculator->calculate(10, 20));
  }
}
