<?php

namespace Drupal\stock_api\Service;

use Drupal\Component\Serialization\Json;

class StockApiClient
{
  /** @var \GuzzleHttp\Client $client */
  private $client;

  public function __construct($http_client_factory)
  {
    $this->client = $http_client_factory->fromOptions([
      'base_uri' => 'http://dev.markitondemand.com/',
    ]);
  }

  public function fetch(string $symbol)
  {
    $response = $this->client->get('MODApis/Api/v2/Quote/json', [
      'query' => [
        'symbol' => $symbol,
      ]
    ]);

    return Json::decode($response->getBody());
  }
}
