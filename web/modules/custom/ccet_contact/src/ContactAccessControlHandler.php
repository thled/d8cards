<?php

namespace Drupal\ccet_contact;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Entity\EntityAccessControlHandler;


class ContactAccessControlHandler extends EntityAccessControlHandler {
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account){
    switch($operation) {
      case 'update':
        return AccessResult::allowedIfHasPermission(
          $account,
          'access administration pages'
        );
      case 'delete':
        return AccessResult::allowedIfHasPermission(
          $account,
          'access administration pages'
        );
    }

    return AccessResult::allowed();
  }
}
