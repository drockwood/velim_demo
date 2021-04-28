<?php

namespace Drupal\drupalup_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Drupalup Block' Block.
 *
 * @Block(
 *   id = "drupalup_block",
 *   admin_label = @Translation("Drupalup block"),
 *   category = @Translation("Display welcome message depending of authentication"),
 * )
 */
class DrupalupBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => $this->getWelcomeMsg(),
      '#cache' => [
        'max-age' => 0
      ],
    ];
  }

  /**
   * Private function for getting username
   */
  private function getCurrentUserName() {
    $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
    return $user->getAccountName();

  }

  /**
   * Private function for getting welcome message
   */
  private function getWelcomeMsg() {
    $msg = "";
    $logged_in = \Drupal::currentUser()->isAuthenticated();
    if($logged_in) {
      $this->getCurrentUserName();
      $msg = "Welcome, " . $this->getCurrentUserName() . "!";
    } else {
      $msg = "<a href='user/login' class='menu__link menu__link--link is-active'>Log In</a>";
    }
    return $msg;
  }

}