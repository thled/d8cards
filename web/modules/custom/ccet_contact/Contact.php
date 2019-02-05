<?php

namespace Drupal\ccet_contact;

use Drupal\Core\Entity\EntityStorageInterface;

class Contact extends ContentEntityBase implements ContactInterface
{
  use EntityChangedTrait;

  public static function preCreate(
    EntityStorageInterface $storage,
    array &$values
  ) {
    parent::preCreate($storage, $values);
    $values += [
      'user_id' => \Drupal::currentUser()->id(),
    ];
  }

  public static function baseFieldDefinitions(EntityTypeInterface $entityType)
  {
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the Contact entity.'))
      ->setReadOnly(true);

    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel('UUID')
      ->setDescription(t('The UUID of the Contact entity.'))
      ->setReadOnly(true);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Contact entity.'))
      ->setSettings([
        'default_value' => '',
        'max_length' => 255,
        'text_processing' => 0,
      ])
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -6,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -6,
      ])
      ->setDisplayConfigurable('view', true)
      ->setDisplayConfigurable('form', true);

    $fields['email'] = BaseFieldDefinition::create('email')
      ->setLabel(t('E-Mail'))
      ->setDescription(t('The E-Mail of the Contact entity.'))
      ->setSettings([
        'default_value' => '',
        'max_length' => 255,
      ])
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'email',
        'weight' => -5,
      ])
      ->setDisplayOptions('form', [
        'type' => 'email',
        'weight' => -5,
      ])
      ->setDisplayConfigurable('view', true)
      ->setDisplayConfigurable('form', true);

    $fields['telephone'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Telephone'))
      ->setDescription(t('The Telephone of the Contact entity.'))
      ->setSettings([
        'default_value' => '',
        'max_length' => 255,
        'text_processing' => 0,
      ])
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('view', true)
      ->setDisplayConfigurable('form', true);

    $fields['address'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Address'))
      ->setDescription(t('The Address of the Contact entity.'))
      ->setSettings([
        'default_value' => '',
        'max_length' => 255,
        'text_processing' => 0,
      ])
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -3,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string',
        'weight' => -3,
      ])
      ->setDisplayConfigurable('view', true)
      ->setDisplayConfigurable('form', true);

    $fields['langcode'] = BaseFieldDefinition::create('language')
      ->setLabel(t('Language code'))
      ->setDescription(t('The language code of Contact entity.'));

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }
}
