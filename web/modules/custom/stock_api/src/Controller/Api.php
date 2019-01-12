<?php

namespace Drupal\stock_api\Controller;

use Drupal\Core\Controller\ControllerBase;

class Api extends ControllerBase
{
  public function fetch()
  {
    $apiUrl = 'http://dev.markitondemand.com/MODApis/Api/v2/Quote/json?symbol=BAC';
    $data = file_get_contents($apiUrl);
    $results = json_decode($data, true);

    return [
      '#markup' => sprintf(
        'LastPrice: %s; ChangeValue: %s',
        $results['LastPrice'],
        $results['Change']
      ),
    ];
  }
}
