<?php

namespace Drupal\Tests\ipo\Kernel;

use Drupal\KernelTests\KernelTestBase;

/**
 * Kernel coverage for the IPO practice module.
 *
 * @group ipo
 */
final class IpoKernelTest extends KernelTestBase {
  protected static $modules = [
    'system',
    'user',
    'node',
    'views',
    'migrate',
    'jsonapi',
    'ipo',
  ];

  protected function setUp(): void {
    parent::setUp();
  }

  public function testCalculatorService(): void {
    $this->assertSame(30, $this->container->get('ipo.calculator')->calculate(10, 20));
  }
}
