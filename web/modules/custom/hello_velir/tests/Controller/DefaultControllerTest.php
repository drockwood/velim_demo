<?php

namespace Drupal\hello_velir\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the hello_velir module.
 */
class DefaultControllerTest extends WebTestBase {


  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return [
      'name' => "hello_velir DefaultController's controller functionality",
      'description' => 'Test Unit for module hello_velir and controller DefaultController.',
      'group' => 'Other',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests hello_velir functionality.
   */
  public function testDefaultController() {
    // Check that the basic functions of module hello_velir.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via Drupal Console.');
  }

}
