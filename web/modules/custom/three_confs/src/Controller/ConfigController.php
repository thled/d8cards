<?php

namespace Drupal\three_confs\Controller;

use Drupal\Core\Controller\ControllerBase;

class ConfigController extends ControllerBase {

  public function configForm() {
    return [
      '#markup' => 'foobar',
    ];
  }

}
