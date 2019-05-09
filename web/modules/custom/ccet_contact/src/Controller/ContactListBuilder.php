<?php

namespace Drupal\ccet_contact\Controller;

use Drupal\Core\Url;
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
    $row['name']['data'] = [
      '#type' => 'link',
      '#url' => Url::fromRoute(
        'ccet_contact.view',
        [
          'contact' => $entity->id->value,
        ]
      ),
      '#title' => $entity->name->value,
    ];
    $row['mail'] = $entity->mail->value;

    return $row + parent::buildRow($entity);
  }
}
