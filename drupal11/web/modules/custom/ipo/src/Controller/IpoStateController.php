<?php

namespace Drupal\ipo\Controller;

use Drupal\Component\Datetime\TimeInterface;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Datetime\DateFormatterInterface;
use Drupal\Core\State\StateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Demonstrates Drupal 11 State API.
 */
class IpoStateController extends ControllerBase {

  /**
   * The State API service.
   *
   * @var \Drupal\Core\State\StateInterface
   */
  protected StateInterface $state;

  /**
   * The date formatter service.
   *
   * @var \Drupal\Core\Datetime\DateFormatterInterface
   */
  protected DateFormatterInterface $dateFormatter;

  /**
   * The time service.
   *
   * @var \Drupal\Component\Datetime\TimeInterface
   */
  protected TimeInterface $time;

  /**
   * Constructs the IPO State controller.
   *
   * @param \Drupal\Core\State\StateInterface $state
   *   The State API service.
   * @param \Drupal\Core\Datetime\DateFormatterInterface $date_formatter
   *   The date formatter service.
   * @param \Drupal\Component\Datetime\TimeInterface $time
   *   The time service.
   */
  public function __construct(
    StateInterface $state,
    DateFormatterInterface $date_formatter,
    TimeInterface $time,
  ) {
    $this->state = $state;
    $this->dateFormatter = $date_formatter;
    $this->time = $time;
  }

  /**
   * Creates the controller using dependency injection.
   *
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container): static {
    return new static(
      $container->get('state'),
      $container->get('date.formatter'),
      $container->get('datetime.time'),
    );
  }

  /**
   * Demonstrates SET, GET, setMultiple() and getMultiple().
   *
   * URL:
   * /ipo/state
   */
  public function state(): array {

    // ---------------------------------------------------------
    // STEP 1:
    // SET MULTIPLE STATE VALUES.
    // ---------------------------------------------------------

    $this->state->setMultiple([
      'ipo.last_import_time' => $this->time->getRequestTime(),
      'ipo.total_ipos' => 25,
      'ipo.import_enabled' => TRUE,
      'ipo.import_status' => 'success',
      'ipo.last_import_message' => 'IPO import completed successfully.',
    ]);


    // ---------------------------------------------------------
    // STEP 2:
    // GET MULTIPLE STATE VALUES.
    // ---------------------------------------------------------

    $ipo_state = $this->state->getMultiple([
      'ipo.last_import_time',
      'ipo.total_ipos',
      'ipo.import_enabled',
      'ipo.import_status',
      'ipo.last_import_message',
    ]);


    // ---------------------------------------------------------
    // STEP 3:
    // PREPARE LAST IMPORT TIME.
    // ---------------------------------------------------------

    $last_import_time = $ipo_state['ipo.last_import_time'] ?? 0;

    $formatted_time = $last_import_time
      ? $this->dateFormatter->format($last_import_time)
      : 'Never';


    // ---------------------------------------------------------
    // STEP 4:
    // RETURN THE DATA.
    // ---------------------------------------------------------

    return [
      '#type' => 'container',

      'title' => [
        '#type' => 'html_tag',
        '#tag' => 'h2',
        '#value' => $this->t('IPO State API Demonstration'),
      ],

      'description' => [
        '#markup' => $this->t(
          '<p>This page demonstrates Drupal 11 State API.</p>'
        ),
      ],

      'values' => [
        '#theme' => 'item_list',

        '#title' => $this->t('Current State Values'),

        '#items' => [
          $this->t(
            'Last import time: @time',
            [
              '@time' => $formatted_time,
            ]
          ),

          $this->t(
            'Total IPOs: @total',
            [
              '@total' => $ipo_state['ipo.total_ipos'] ?? 0,
            ]
          ),

          $this->t(
            'Import enabled: @enabled',
            [
              '@enabled' => !empty(
                $ipo_state['ipo.import_enabled']
              )
                ? 'Yes'
                : 'No',
            ]
          ),

          $this->t(
            'Import status: @status',
            [
              '@status' => $ipo_state['ipo.import_status'] ?? 'Unknown',
            ]
          ),

          $this->t(
            'Last import message: @message',
            [
              '@message' => $ipo_state['ipo.last_import_message']
                ?? 'No message',
            ]
          ),
        ],
      ],

      'links' => [
        '#type' => 'container',

        'update' => [
          '#type' => 'link',
          '#title' => $this->t('Update State'),
          '#url' => \Drupal\Core\Url::fromRoute(
            'ipo.state_update'
          ),
        ],

        'delete' => [
          '#type' => 'link',
          '#title' => $this->t('Delete State'),
          '#url' => \Drupal\Core\Url::fromRoute(
            'ipo.state_delete'
          ),
        ],
      ],
    ];
  }

  /**
   * Demonstrates updating existing State values.
   *
   * URL:
   * /ipo/state/update
   */
  public function updateState(): array {

    // ---------------------------------------------------------
    // UPDATE STATE VALUES.
    // ---------------------------------------------------------

    $this->state->setMultiple([
      'ipo.total_ipos' => 100,
      'ipo.import_enabled' => FALSE,
      'ipo.import_status' => 'updated',
      'ipo.last_import_message' => 'IPO state was updated manually.',
      'ipo.last_import_time' => $this->time->getRequestTime(),
    ]);


    // ---------------------------------------------------------
    // READ THE UPDATED VALUES.
    // ---------------------------------------------------------

    $ipo_state = $this->state->getMultiple([
      'ipo.last_import_time',
      'ipo.total_ipos',
      'ipo.import_enabled',
      'ipo.import_status',
      'ipo.last_import_message',
    ]);


    // ---------------------------------------------------------
    // FORMAT TIME.
    // ---------------------------------------------------------

    $last_import_time = $ipo_state['ipo.last_import_time'] ?? 0;

    $formatted_time = $last_import_time
      ? $this->dateFormatter->format($last_import_time)
      : 'Never';


    // ---------------------------------------------------------
    // RETURN RESULT.
    // ---------------------------------------------------------

    return [
      '#type' => 'container',

      'title' => [
        '#type' => 'html_tag',
        '#tag' => 'h2',
        '#value' => $this->t('IPO State Updated'),
      ],

      'message' => [
        '#markup' => $this->t(
          '<p>The State API values have been updated.</p>'
        ),
      ],

      'values' => [
        '#theme' => 'item_list',

        '#title' => $this->t('Updated Values'),

        '#items' => [
          $this->t(
            'Last import time: @time',
            [
              '@time' => $formatted_time,
            ]
          ),

          $this->t(
            'Total IPOs: @total',
            [
              '@total' => $ipo_state['ipo.total_ipos'] ?? 0,
            ]
          ),

          $this->t(
            'Import enabled: @enabled',
            [
              '@enabled' => !empty(
                $ipo_state['ipo.import_enabled']
              )
                ? 'Yes'
                : 'No',
            ]
          ),

          $this->t(
            'Import status: @status',
            [
              '@status' => $ipo_state['ipo.import_status'] ?? 'Unknown',
            ]
          ),

          $this->t(
            'Message: @message',
            [
              '@message' => $ipo_state['ipo.last_import_message']
                ?? 'No message',
            ]
          ),
        ],
      ],

      'back' => [
        '#type' => 'link',
        '#title' => $this->t('Back to State API'),
        '#url' => \Drupal\Core\Url::fromRoute(
          'ipo.state'
        ),
      ],
    ];
  }

  /**
   * Demonstrates delete() and deleteMultiple().
   *
   * URL:
   * /ipo/state/delete
   */
  public function deleteState(): array {

    // ---------------------------------------------------------
    // DELETE MULTIPLE STATE VALUES.
    // ---------------------------------------------------------

    $this->state->deleteMultiple([
      'ipo.last_import_time',
      'ipo.total_ipos',
      'ipo.import_enabled',
      'ipo.import_status',
      'ipo.last_import_message',
    ]);


    // ---------------------------------------------------------
    // RETURN RESULT.
    // ---------------------------------------------------------

    return [
      '#type' => 'container',

      'title' => [
        '#type' => 'html_tag',
        '#tag' => 'h2',
        '#value' => $this->t('IPO State Deleted'),
      ],

      'message' => [
        '#markup' => $this->t(
          '<p>All IPO State API values have been deleted.</p>'
        ),
      ],

      'back' => [
        '#type' => 'link',
        '#title' => $this->t('Back to State API'),
        '#url' => \Drupal\Core\Url::fromRoute(
          'ipo.state'
        ),
      ],
    ];
  }

}
