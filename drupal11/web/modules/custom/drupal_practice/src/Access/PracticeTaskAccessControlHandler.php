<?php

namespace Drupal\drupal_practice\Access;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Defines the access control handler for Practice Task entities.
 */
final class PracticeTaskAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(
    EntityInterface $entity,
    $operation,
    AccountInterface $account
  ): AccessResult {

    // Administrators can perform all operations.
    if ($account->hasPermission('administer practice')) {
      return AccessResult::allowed()
        ->cachePerPermissions();
    }

    // Viewing a task requires the view permission.
    if ($operation === 'view') {
      return AccessResult::allowedIfHasPermission(
        $account,
        'view practice dashboard'
      );
    }

    // Users can update or delete their own tasks.
    if ($operation === 'update' || $operation === 'delete') {
      return AccessResult::allowedIf(
        $entity->getOwnerId() === $account->id()
        && $account->hasPermission('manage own practice tasks')
      )
        ->cachePerUser()
        ->addCacheableDependency($entity);
    }

    // Deny/neutral for unsupported operations.
    return AccessResult::neutral()
      ->cachePerPermissions();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(
    AccountInterface $account,
    array $context,
    $entity_bundle = NULL
  ): AccessResult {

    // Creating a task requires the create permission.
    return AccessResult::allowedIfHasPermission(
      $account,
      'create practice tasks'
    );
  }

}