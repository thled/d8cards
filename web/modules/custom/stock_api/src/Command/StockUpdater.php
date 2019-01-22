<?php

namespace Drupal\stock_api\Command;

use Drush\Commands\DrushCommands;
use Drupal\Core\Entity\EntityTypeManager;
use Drupal\stock_api\Service\StockApiClient;

class StockUpdater extends DrushCommands
{
  /** @var EntityTypeManager */
  private $entityTypeManager;

  /** @var \GuzzleHttp\Client $client */
  private $stockClient;

  public function __construct(
    EntityTypeManager $entityTypeManager,
    StockApiClient $stockApiClient)
  {
    $this->entityTypeManager = $entityTypeManager;
    $this->stockClient = $stockApiClient;
  }
  /**
   * @command stock_api:update_all_stocks
   * @aliases upstocks
   */
  public function updateAllStocks()
  {
    $stocks = $this->entityTypeManager->getStorage('block_content')
    ->loadByProperties([
      'type' => 'stock_exchange_rate_card',
    ]);

    foreach($stocks as $stock){
      $symbol = $stock->get('field_symbol')->value;
      $data = $this->stockClient->fetch($symbol);
      $stock->set('field_last_price', $data['LastPrice']);
      $stock->set('field_change', $data['Change']);
      $stock->save();
    }

    $this->output()->writeln('All stocks are updated!');
  }
}
