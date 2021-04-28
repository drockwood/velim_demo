Tasks 1, 2, 5:
   drupal generate:module
   drupal generate:controller

   Files: modules/custom/hello_velir
   Notes: Added the JsonResponse Class for the json controller
   Todo:  Drupal is still not rendering json correctly.

Task 3:
   drupal generate:module
   drupal generate:entity:content
   drupal update:entities

   Files: modules/custom/user_configuration

Task 4:
   Copied the existing theme 
   Assigned the subtitle data to a twig variable in theme.module
   Rendered data as uppercase in twig template

   Files: themes/olivero/templates/field--field-article-subtitle.html.twig
          themes/olivero/olivero.theme
Task 6:
   Files: modules/custom/welcome_block
