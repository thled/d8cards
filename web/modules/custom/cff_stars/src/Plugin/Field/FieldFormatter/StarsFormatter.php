<?php

namespace Drupal\cff_stars\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * @FieldFormatter(
 *   id = "cff_stars",
 *   label = @Translation("Custom Field Formatter Stars"),
 *   field_types = {
 *     "decimal"
 *   }
 * )
 */
class StarsFormatter extends FormatterBase
{
  public function viewElements(FieldItemListInterface $items, $langcode)
  {
    $rating = $items[0]->value;

    return [
      '#theme' => 'cff_stars',
      '#stars' => round(($rating/5)*100),
      '#attached' => ['library' => 'cff_stars/stars'],
    ];
  }
}
