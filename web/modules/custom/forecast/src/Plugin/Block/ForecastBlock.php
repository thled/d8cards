<?php

namespace Drupal\forecast\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * @Block(
 *   id = "forecast_block",
 *   admin_label = @Translation("Forecast")
 * )
 */
class ForecastBlock extends BlockBase {
  public function build() {
    return [
      '#markup' => $this->t('Forecast is XXXXX with temperature of XXX deg C'),
    ];
  }
}
