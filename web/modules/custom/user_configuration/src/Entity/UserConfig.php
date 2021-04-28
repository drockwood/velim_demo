<?php

namespace Drupal\user_configuration\Entity;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityPublishedTrait;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the User Configuration entity.
 *
 * @ingroup user_configuration
 *
 * @ContentEntityType(
 *   id = "user_config",
 *   label = @Translation("User Configuration"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\user_configuration\UserConfigListBuilder",
 *     "views_data" = "Drupal\user_configuration\Entity\UserConfigViewsData",
 *     "translation" = "Drupal\user_configuration\UserConfigTranslationHandler",
 *
 *     "form" = {
 *       "default" = "Drupal\user_configuration\Form\UserConfigForm",
 *       "add" = "Drupal\user_configuration\Form\UserConfigForm",
 *       "edit" = "Drupal\user_configuration\Form\UserConfigForm",
 *       "delete" = "Drupal\user_configuration\Form\UserConfigDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\user_configuration\UserConfigHtmlRouteProvider",
 *     },
 *     "access" = "Drupal\user_configuration\UserConfigAccessControlHandler",
 *   },
 *   base_table = "user_config",
 *   data_table = "user_config_field_data",
 *   translatable = TRUE,
 *   admin_permission = "administer user configuration entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "langcode" = "langcode",
 *     "published" = "status",
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/user_config/{user_config}",
 *     "add-form" = "/admin/structure/user_config/add",
 *     "edit-form" = "/admin/structure/user_config/{user_config}/edit",
 *     "delete-form" = "/admin/structure/user_config/{user_config}/delete",
 *     "collection" = "/admin/structure/user_config",
 *   },
 *   field_ui_base_route = "user_config.settings"
 * )
 */
class UserConfig extends ContentEntityBase implements UserConfigInterface {

  use EntityChangedTrait;
  use EntityPublishedTrait;

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getLastname() {
    return $this->get('lastname')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setLastname($lastname) {
    $this->set('lastname', $lastname);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    // Add the published field.
    $fields += static::publishedBaseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('First Name'))
      ->setDescription(t('Your first name.'))
      ->setSettings([
        'max_length' => 50,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE);

    $fields['lastname'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Last Name'))
      ->setDescription('Your last name')
      ->setSettings([
        'max_length' => 50,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE);

    $fields['status']->setDescription(t('A boolean indicating whether the User Configuration is published.'))
      ->setDisplayOptions('form', [
        'type' => 'boolean_checkbox',
        'weight' => -3,
      ]);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }

}
