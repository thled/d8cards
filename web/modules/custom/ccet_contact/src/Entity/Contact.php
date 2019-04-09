<?php

namespace Drupal\ccet_contact\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\ccet_contact\ContactInterface;

/**
 * @ContentEntityType(
 *   id = "contact",
 *   label = @Translation("contact"),
 *   base_table = "contact",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *   },
 *   handlers = {
 *     "list_builder" = "Drupal\ccet_contact\Controller\ContactListBuilder",
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "form" = {
 *       "add" = "Drupal\Core\Entity\ContentEntityForm",
 *       "edit" = "Drupal\Core\Entity\ContentEntityForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *     },
 *     "access" = "Drupal\ccet_contact\ContactAccessControlHandler",
 *   },
 *   links = {
 *     "edit-form" = "/",
 *     "delete-form" = "/",
 *   },
 * )
 */
class Contact extends ContentEntityBase implements ContactInterface
{
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type)
  {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setRequired(true)
      ->setDescription(t('The name of the Contact entity.'))
      ->setSetting('max_length', 255)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -5,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -5,
      ])
      ->setDisplayConfigurable('form', true);

    $fields['mail'] = BaseFieldDefinition::create('email')
      ->setLabel(t('Email'))
      ->setDescription(t('The email of the Contact entity.'))
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'email',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'email',
        'weight' => -4,
      ]);

    return $fields;
  }
}
