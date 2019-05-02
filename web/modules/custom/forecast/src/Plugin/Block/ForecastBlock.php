<?php

namespace Drupal\forecast\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * @Block(
 *   id = "forecast_block",
 *   admin_label = @Translation("Forecast")
 * )
 */
class ForecastBlock extends BlockBase
{
  public function blockForm($form, FormStateInterface $form_state)
  {
    parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    $form['latitude'] = [
      '#type' => 'textfield',
      '#title' => $this->t('latitude'),
      '#default_value' => $config['latitude'] ?? '',
    ];
    $form['longitude'] = [
      '#type' => 'textfield',
      '#title' => $this->t('longitude'),
      '#default_value' => $config['longitude'] ?? '',
    ];

    return $form;
  }

  public function blockSubmit($form, FormStateInterface $form_state)
  {
    $this->setConfigurationValue('latitude', $form_state->getValue('latitude'));
    $this->setConfigurationValue('longitude', $form_state->getValue('longitude'));
  }

  public function build()
  {
    $config = $this->getConfiguration();

    $latitude = $config['latitude'] ?? '0';
    $longitude = $config['longitude'] ?? '0';

    return [
      '#markup' => $this->t(
        'Forecast is @forecast with temperature of @temp deg C',
      [
        '@forecast' => 'Clear',
        '@temp' => '19',
      ]),
    ];
  }
}
