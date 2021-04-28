<?php

namespace Drupal\user_configuration\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Form controller for User Configuration edit forms.
 *
 * @ingroup user_configuration
 */
class UserConfigForm extends ContentEntityForm {

  /**
   * The current user account.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $account;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    // Instantiates this form class.
    $instance = parent::create($container);
    $instance->account = $container->get('current_user');
    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var \Drupal\user_configuration\Entity\UserConfig $entity */
    $form = parent::buildForm($form, $form_state);

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;
    $entity_values = $entity->toArray();
    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label %lname User Configuration.', [
          '%label' => $entity->label(),
          '%lname' => $entity_values['lastname'][0]['value'],
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label %lname User Configuration.', [
          '%label' => $entity->label(),
          '%lname' => $entity_values['lastname'][0]['value'],
        ]));
    }
    $form_state->setRedirect('entity.user_config.canonical', ['user_config' => $entity->id()]);
  }

}
