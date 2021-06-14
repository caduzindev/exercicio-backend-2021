<?php

namespace Drupal\textwrap\Controller;

use Drupal\Core\Controller\ControllerBase;

class TextWrapController extends ControllerBase {
  public function content() {
    $build = [
      '#theme'=>'textWrap',
    ];
    return $build;
  }

}