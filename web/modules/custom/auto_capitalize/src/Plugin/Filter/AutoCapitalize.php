<?php

namespace Drupal\auto_capitalize\Plugin\Filter;

use Drupal\filter\Plugin\FilterBase;
use Drupal\filter\FilterProcessResult;
use Drupal\Core\Form\FormStateInterface;

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
    $words = \explode(
      ',',
      \strtolower(
        \str_replace(' ', '', $this->settings['capitalize_words'])
      )
    );

    foreach ($words as $word) {
      $text = \str_replace($word, \ucfirst($word), $text);
    }

    return new FilterProcessResult($text);
  }

  public function settingsForm(array $form, FormStateInterface $form_state)
  {
    $form['capitalize_words'] = [
      '#type' => 'textarea',
      '#title' => 'Words to capitalize',
      '#default_value' => $this->settings['capitalize_words'] ?? '',
      '#description' => 'List of words to capitalize (comma separated)',
    ];

    return $form;
  }
}
