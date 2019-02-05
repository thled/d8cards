<?php

namespace Drupal\ccet_contact;

use Drupal\user\EntityOwnerInterface;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;

interface ContactInterface extends
  ContentEntityInterface,
  EntityOwnerInterface,
  EntityChangedInterface
{
}
