<?php

namespace Drupal\user_configuration\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;

/**
 * Provides an interface for defining User Configuration entities.
 *
 * @ingroup user_configuration
 */
interface UserConfigInterface extends ContentEntityInterface, EntityChangedInterface, EntityPublishedInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the User Configuration name.
   *
   * @return string
   *   Name of the User Configuration.
   */
  public function getName();

  /**
   * Sets the User Configuration name.
   *
   * @param string $name
   *   The User Configuration name.
   *
   * @return \Drupal\user_configuration\Entity\UserConfigInterface
   *   The called User Configuration entity.
   */
  public function setName($name);

  /**
   * Gets the Velir config lastname.
   *
   * @return string
   *   Last Name of the Velir config.
   */
  public function getLastname();

  /**
   * Sets the Velir config lastname.
   *
   * @param string $lastname
   *   The Velir config lastname.
   *
   * @return \Drupal\velir_config_demo\Entity\VelirConfigInterface
   *   The called Velir config entity.
   */
  public function setLastname($lastname);

  /**
   * Gets the User Configuration creation timestamp.
   *
   * @return int
   *   Creation timestamp of the User Configuration.
   */
  public function getCreatedTime();

  /**
   * Sets the User Configuration creation timestamp.
   *
   * @param int $timestamp
   *   The User Configuration creation timestamp.
   *
   * @return \Drupal\user_configuration\Entity\UserConfigInterface
   *   The called User Configuration entity.
   */
  public function setCreatedTime($timestamp);

}
