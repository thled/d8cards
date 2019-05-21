<?php

namespace Drupal\cached_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Entity\EntityTypeManager;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Cache\CacheBackendInterface;

/**
 * @Block(
 *   id = "cached_block",
 *   admin_label = @Translation("Cached Block")
 * )
 */
class CachedBlock extends BlockBase implements ContainerFactoryPluginInterface
{
  /** @var EntityTypeManager */
  private $entityTypeManager;

  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    EntityTypeManagerInterface $etm,
    CacheBackendInterface $cbf
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->entityTypeManager = $etm;
    $this->cache = $cbf;
  }

  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition): self
  {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager'),
      $container->get('cache.default')
    );
  }

  public function build(): array
  {
    $latestNodes = $this->loadLatestNodes();

    return [
      '#markup' => $latestNodes,
    ];
  }

  private function loadLatestNodes()
  {
    if ($cache = $this->cache->get('latest_nodes')) {
      return $cache->data;
    }

    $storage = $this->entityTypeManager->getStorage('node');
    $ids = $storage->getQuery()->sort('created', 'DESC')->range(0, 5)->execute();
    $nodes = $storage->loadMultiple($ids);

    $nodeTitles = '';
    foreach ($nodes as $node) {
      $nodeTitles = $nodeTitles . ' - ' . $node->title->value;
    }

    $this->cache->set('latest_nodes', $nodeTitles, CacheBackendInterface::CACHE_PERMANENT);

    return $nodeTitles;
  }
}
