<?php

namespace Drupal\ipo\Controller;

use Drupal\Core\Cache\CacheableJsonResponse;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Render\Markup;
use Drupal\ipo\Service\IpoCalculator;
use Symfony\Component\DependencyInjection\ContainerInterface;

final class IpoController extends ControllerBase {

  public function __construct(private readonly IpoCalculator $calculator) {}

  public static function create(ContainerInterface $container): static {
    return new static($container->get('ipo.calculator'));
  }

  public function dashboard(): array {
    $value = $this->calculator->calculate(10, rand(10,100));
    return [
      '#theme' => 'ipo_dashboard',
      '#title' => $this->t('IPO Drupal 11 Practice'),
      '#items' => [
        $this->t('Calculator result: @value', ['@value' => $value]),
        $this->t('Plugin discovery, derivatives, Forms, AJAX, routing and access are included.'),
        $this->t('Cache metadata and Render API are demonstrated by the controller response.'),
      ],
      '#cache' => [
        'contexts' => ['user.permissions'],
        'tags' => ['ipo:dashboard'],
        'max-age' => 0, //300
      ],
    ];
  }

  public function secure(): array {
    return [
      '#markup' => Markup::create('<p>' . $this->t('You passed the custom access check.') . '</p>'),
      '#cache' => [
        'contexts' => ['user'],
        'max-age' => 0,
      ],
    ];
  }

}
