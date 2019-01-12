<?php

namespace Drupal\stock_api\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\stock_api\Service\StockApiClient;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Api extends ControllerBase
{
  /** @var \GuzzleHttp\Client $client */
  private $client;

  public function __construct(StockApiClient $stockApiClient)
  {
    $this->client = $stockApiClient;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('stock_api.stock_api_client')
    );
  }

  public function fetch()
  {
    $results = $this->client->fetch('BAC');

    return [
      '#markup' => sprintf(
        'LastPrice: %s; ChangeValue: %s',
        $results['LastPrice'],
        $results['Change']
      ),
    ];
  }
}
