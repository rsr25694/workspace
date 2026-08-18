<?php

namespace Drupal\drupal_practice\Plugin\Validation\Constraint;

use Drupal\Core\Field\FieldItemListInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the Practice Task title constraint.
 */
final class PracticeTaskTitleValidator extends ConstraintValidator {

  /**
   * {@inheritdoc}
   */
  public function validate(
    mixed $value,
    Constraint $constraint
  ): void {

    if (!$constraint instanceof PracticeTaskTitle) {
      return;
    }

    // Field-level constraints receive a FieldItemList.
    if ($value instanceof FieldItemListInterface) {
      $value = $value->value;
    }

    // Nothing to validate.
    if ($value === NULL || $value === '') {
      return;
    }

    $title = trim((string) $value);

    if (mb_strlen($title) < 5) {
      $this->context->addViolation(
        $constraint->message
      );
    }

  }

}