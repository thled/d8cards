<?php

namespace Drupal\ccet_contact\Controller;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;

class ContactListBuilder extends EntityListBuilder
{
  public function buildHeader()
  {
    $header = [
      'name' => $this->t('Name'),
      'mail' => $this->t('Mail'),
    ];

    return $header + parent::buildHeader();
  }

  public function buildRow(EntityInterface $entity)
  {
    $row = [
      'name' => $entity->name->value,
      'mail' => $entity->mail->value,
    ];

    return $row + parent::buildRow($entity);
  }
}
