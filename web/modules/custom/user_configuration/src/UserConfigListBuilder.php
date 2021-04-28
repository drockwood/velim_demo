<?php

namespace Drupal\user_configuration;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of User Configuration entities.
 *
 * @ingroup user_configuration
 */
class UserConfigListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('User Configuration ID');
    $header['name'] = $this->t('First Name');
    $header['lastname'] = $this->t('Last Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var \Drupal\user_configuration\Entity\UserConfig $entity */
    $entity_values = $entity->toArray();
    $row['id'] = Link::createFromRoute(
      $entity->id(),
      'entity.user_config.edit_form',
      ['user_config' => $entity->id()]
    );
    $row['name'] = $entity_values['name'][0]['value'];
    $row['lastname'] = $entity_values['lastname'][0]['value'];
    return $row + parent::buildRow($entity);
  }

}
