<?php

namespace Drupal\three_confs\Controller;

use Drupal\Core\Controller\ControllerBase;

class ShowConfig extends ControllerBase
{

  public function show()
  {
    $threeConfs = \Drupal::config('three_confs.important');

    $text[] = 'Answer: ';
    $text[] = $threeConfs->get('answer_universe');
    $text[] = 'Language: ';
    $text[] = $threeConfs->get('best_language');
    $text[] = 'Dark: ';
    $text[] = $threeConfs->get('dark_mode');
    $text = implode('<br>', $text);

    return [
      '#markup' => $text,
    ];
  }

}
