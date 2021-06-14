<?php

namespace Drupal\textwrap\Controller;

use Drupal\Core\Controller\ControllerBase;

class TextWrapController extends ControllerBase {
  public function content() {
    $build = [
      '#markup' => $this->t('Hello World!'),
    ];
    return $build;
  }

}