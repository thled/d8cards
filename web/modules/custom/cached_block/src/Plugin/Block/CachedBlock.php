<?php

namespace Drupal\cached_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Entity\EntityTypeManager;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use League\Container\ContainerInterface;

/**
 * @Block(
 *   id = "cached_block",
 *   admin_label = @Translation("Cached Block")
 * )
 */
class CachedBlock extends BlockBase //implements ContainerFactoryPluginInterface
{
  /** @var EntityTypeManager */
  // private $entityTypeManager;

  // public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityTypeManagerInterface $etm) {
    // parent::__construct($configuration, $plugin_id, $plugin_definition);
    // $this->entityTypeManager = $etm;
  // }

  // public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    // return new static(
      // $configuration,
      // $plugin_id,
      // $plugin_definition,
      // $container->get('entity_type.manager')
    // );
  // }

  public function build()
  {
    // $storage = $this->entityTypeManager->getStorage('node');
    // $ids = $storage->getQuery()->sort('created', 'DESC')->execute();

    // $nodes = $storage->loadMultiple($ids);

    return [
      '#markup' => 'foobar',
    ];
  }
}
