<?php
/**
 * @file
 * template.php
 *
 * This file should only contain light helper functions and stubs pointing to
 * other files containing more complex functions.
 *
 * The stubs should point to files within the `theme` folder named after the
 * function itself minus the theme prefix. If the stub contains a group of
 * functions, then please organize them so they are related in some way and name
 * the file appropriately to at least hint at what it contains.
 *
 * All [pre]process functions, theme functions and template implementations also
 * live in the 'theme' folder. This is a highly automated and complex system
 * designed to only load the necessary files when a given theme hook is invoked.
 * @see _bootstrap_theme()
 * @see theme/registry.inc
 *
 * Due to a bug in Drush, these includes must live inside the 'theme' folder
 * instead of something like 'includes'. If a module or theme has an 'includes'
 * folder, Drush will think it is trying to bootstrap core when it is invoked
 * from inside the particular extension's directory.
 * @see https://drupal.org/node/2102287
 */

/**
 * Include common functions used through out theme.
 */
//include_once dirname(__FILE__) . '/theme/common.inc';

/**
 * Implements hook_theme().
 *
 * Register theme hook implementations.
 *
 * The implementations declared by this hook have two purposes: either they
 * specify how a particular render array is to be rendered as HTML (this is
 * usually the case if the theme function is assigned to the render array's
 * #theme property), or they return the HTML that should be returned by an
 * invocation of theme().
 *
 * @see _bootstrap_theme()
 */
/*function bootstrap_theme(&$existing, $type, $theme, $path) {
  bootstrap_include($theme, 'theme/registry.inc');
  return _bootstrap_theme($existing, $type, $theme, $path);
}*/

/**
 * Declare various hook_*_alter() hooks.
 *
 * hook_*_alter() implementations must live (via include) inside this file so
 * they are properly detected when drupal_alter() is invoked.
 */
//bootstrap_include('bootstrap', 'theme/alter.inc');

function custombootstrap_preprocess_html(&$variables) {
  drupal_add_css('http://fonts.googleapis.com/css?family=Roboto:400,700|Roboto+Condensed:400,700', array('type' => 'external'));
  drupal_add_css('http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', array('type' => 'external'));
  drupal_add_js('http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', 'external');
}

/**
 * THEME_preprocess_image_style() -- Set responsive class on images served via Views
 */ 
function custombootstrap_preprocess_image(&$variables) {
  if(isset($variables['style_name'])) {
    if($variables['style_name'] == '700' || $variables['style_name'] == '1100') {
      $variables['attributes']['class'][] = "img-responsive";
    }
  }
}

/**
 * THEME_preprocess_page -- Remove no content message on taxonomy pages
 */
function custombootstrap_preprocess_page(&$vars) {
  if(isset($vars['page']['content']['system_main']['no_content'])) {
    unset($vars['page']['content']['system_main']['no_content']);
  }
}