<?php

namespace Drupal\auto_capitalize\Plugin\Filter;

use Drupal\filter\Plugin\FilterBase;
use Drupal\filter\FilterProcessResult;

/**
 * @Filter(
 *   id = "auto_capitalize",
 *   title = "Auto Capitalize Text Filter",
 *   description = "Auto capitalizes given words",
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_TRANSFORM_REVERSIBLE,
 * )
 */
class AutoCapitalize extends FilterBase
{
  public function process($text, $langcode)
  {
    $newText = str_replace('foo', 'bar', $text);
    return new FilterProcessResult($newText);
  }
}
