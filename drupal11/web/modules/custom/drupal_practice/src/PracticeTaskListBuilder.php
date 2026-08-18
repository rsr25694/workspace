<?php

namespace Drupal\drupal_practice;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;

final class PracticeTaskListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader(): array {
    $header['title'] = $this->t('Title');
    $header['status'] = $this->t('Status');
    $header['priority'] = $this->t('Priority');
    $header['owner'] = $this->t('Owner');

    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity): array {
    /** @var \Drupal\drupal_practice\Entity\PracticeTask $entity */

    $row['title'] = $entity->toLink();
    $row['status'] = $entity->get('status')->value;
    $row['priority'] = $entity->get('priority')->value;
    $row['owner'] = $entity->get('uid')->entity?->label() ?? '';

    return $row + parent::buildRow($entity);
  }

}