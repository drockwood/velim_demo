<?php

namespace Drupal\hello_velir\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class DefaultController.
 */
class DefaultController extends ControllerBase {

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function hello() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('<h2 class="hello_msg">Hello, my name is Dan.</h2>')
    ];
  }
  /**
   * Hello_json.
   *
   * @return string
   *   Return Hello string.
   */
  public function hello_json() {
    return new JsonResponse(
      [
        'data' => 'Hello, My name is Dan.',
        'method' => 'GET',
      ]
    );
  }

}
