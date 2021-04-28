<?php

/**
 * @file
 * Contains user_config.page.inc.
 *
 * Page callback for User Configuration entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for User Configuration templates.
 *
 * Default template: user_config.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_user_config(array &$variables) {
  // Fetch UserConfig Entity Object.
  $user_config = $variables['elements']['#user_config'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
