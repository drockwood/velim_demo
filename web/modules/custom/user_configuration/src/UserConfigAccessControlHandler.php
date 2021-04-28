<?php

namespace Drupal\user_configuration;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the User Configuration entity.
 *
 * @see \Drupal\user_configuration\Entity\UserConfig.
 */
class UserConfigAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\user_configuration\Entity\UserConfigInterface $entity */

    switch ($operation) {

      case 'view':

        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished user configuration entities');
        }


        return AccessResult::allowedIfHasPermission($account, 'view published user configuration entities');

      case 'update':

        return AccessResult::allowedIfHasPermission($account, 'edit user configuration entities');

      case 'delete':

        return AccessResult::allowedIfHasPermission($account, 'delete user configuration entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add user configuration entities');
  }


}
