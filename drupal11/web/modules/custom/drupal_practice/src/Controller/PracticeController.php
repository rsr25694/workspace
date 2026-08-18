<?php

namespace Drupal\drupal_practice\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\drupal_practice\Service\PracticeManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

final class PracticeController extends ControllerBase {

  /**
   * The practice manager.
   *
   * @var \Drupal\drupal_practice\Service\PracticeManagerInterface
   */
  protected PracticeManagerInterface $practiceManager;

  /**
   * Constructs the controller.
   */
  public function __construct(
    PracticeManagerInterface $practice_manager,
  ) {
    $this->practiceManager = $practice_manager;
  }

  /**
   * Creates the controller from the container.
   */
  public static function create(ContainerInterface $container): static {
    return new static(
      $container->get('drupal_practice.manager'),
    );
  }

  /**
   * Displays the practice dashboard.
   */
  public function dashboard(): array {
    $statistics = $this->practiceManager->getDashboardStatistics();

    return [
      '#theme' => 'practice_dashboard',
      '#statistics' => $statistics,
    ];
  }

}