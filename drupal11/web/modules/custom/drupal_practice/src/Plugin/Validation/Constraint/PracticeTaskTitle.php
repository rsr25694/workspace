<?php

namespace Drupal\drupal_practice\Plugin\Validation\Constraint;

use Drupal\Core\Validation\Attribute\Constraint;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Symfony\Component\Validator\Constraint as SymfonyConstraint;

/**
 * Validates the Practice Task title.
 */
#[Constraint(
  id: 'PracticeTaskTitle',
  label: new TranslatableMarkup('Practice Task title'),
  type: 'string',
)]
final class PracticeTaskTitle extends SymfonyConstraint {

  /**
   * Validation error message.
   *
   * @var string
   */
  public string $message = 'The task title must contain at least 5 characters.';

}