<?php

function starter_preprocess_html(&$vars) {
  $theme_path = drupal_get_path('theme', 'starter');
  // Add CSS
  // Give IE6 and below a basic typography stylesheet. No need to worry about this browser any further
  drupal_add_css('http://universal-ie6-css.googlecode.com/files/ie6.0.3.css', array('type' => 'external', 'group' => CSS_THEME, 'media' => 'all', 'browsers' => array('IE' => 'IE 6', '!IE' => FALSE),));
  // Grid
  // drupal_add_css($theme_path . '/plugins/fluid960grid/css/grid.css', array('group' => CSS_THEME));
  drupal_add_css($theme_path . '/plugins/fixed960grid/code/css/960.css', array('group' => CSS_THEME));
  // IE
  drupal_add_css($theme_path . '/css/ie/ie.css', array('group' => CSS_THEME, 'media' => 'screen', 'browsers' => array('IE' => 'IE', '!IE' => FALSE), 'preprocess' => FALSE,));
  drupal_add_css($theme_path . '/css/ie/ie-7.css', array('group' => CSS_THEME, 'media' => 'screen', 'browsers' => array('IE' => 'IE 7', '!IE' => FALSE), 'preprocess' => FALSE,));
  drupal_add_css($theme_path . '/css/ie/ie-8.css', array('group' => CSS_THEME, 'media' => 'screen', 'browsers' => array('IE' => 'IE 8', '!IE' => FALSE), 'preprocess' => FALSE,));
  drupal_add_css($theme_path . '/css/ie/lte-ie-8.css', array('group' => CSS_THEME, 'media' => 'screen', 'browsers' => array('IE' => 'lte IE 8', '!IE' => FALSE), 'preprocess' => FALSE,));
  drupal_add_css($theme_path . '/css/ie/gte-ie-9.css', array('group' => CSS_THEME, 'media' => 'screen', 'browsers' => array('IE' => 'gte IE 9', '!IE' => FALSE), 'preprocess' => FALSE,));
  
  // Add JavaScript
  // html5.js is required for IE8 and older to understand the new elements like article
  // @see http://remysharp.com/2009/01/07/html5-enabling-script/
  drupal_add_css('http://html5shim.googlecode.com/svn/trunk/html5.js', array('type' => 'external', 'group' => CSS_THEME, 'media' => 'all', 'browsers' => array('IE' => 'lte IE 8', '!IE' => FALSE),));
  // Modernizr tests an agent's capabilites and adds classes to the html tag representing them
  drupal_add_js($theme_path . '/plugins/modernizr/modernizr.js', array('every_page' => TRUE, 'scope' => 'footer', 'group' => JS_THEME,));
  //
}

function starter_preprocess_page (&$vars) {}

function starter_preprocess_node (&$vars) {}