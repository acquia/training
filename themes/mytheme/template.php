<?php


function mytheme_preprocess_html(&$vars) {
  $theme_path = drupal_get_path('theme', 'mytheme');
 
  // IE
  drupal_add_css($theme_path . '/css/ie/ie.css', array('group' => CSS_THEME, 'media' => 'screen', 'browsers' => array('IE' => 'IE', '!IE' => FALSE), 'preprocess' => FALSE,));
  drupal_add_css($theme_path . '/css/ie/ie-7.css', array('group' => CSS_THEME, 'media' => 'screen', 'browsers' => array('IE' => 'IE 7', '!IE' => FALSE), 'preprocess' => FALSE,));
  drupal_add_css($theme_path . '/css/ie/ie-8.css', array('group' => CSS_THEME, 'media' => 'screen', 'browsers' => array('IE' => 'IE 8', '!IE' => FALSE), 'preprocess' => FALSE,));
  drupal_add_css($theme_path . '/css/ie/lte-ie-8.css', array('group' => CSS_THEME, 'media' => 'screen', 'browsers' => array('IE' => 'lte IE 8', '!IE' => FALSE), 'preprocess' => FALSE,));
  drupal_add_css($theme_path . '/css/ie/gte-ie-9.css', array('group' => CSS_THEME, 'media' => 'screen', 'browsers' => array('IE' => 'gte IE 9', '!IE' => FALSE), 'preprocess' => FALSE,));
}


function mytheme_preprocess_page(&$variables) {

//  $variables['credits'] = t("Built by me!");
//  $variables['site_slogan'] = t("Making a bigger Internet. One site at a time.");

//	drupal_set_message(t('Don\'t panic!'), 'warning');
	
	 $items = array(
	 'Drupal.org',
	 'PHP.net',
	 'W3C',
	 );
  $variables['affiliates'] = theme('item_list', array('items' => $items));

}

function mytheme_preprocess_node(&$variables)  {

  $variables['submitted'] = t('!datetime | by !username', array(
    '!username' => $variables['name'],
    '!datetime' => $variables['date'],
  ));

  // check if comment is enabled = 1, or if there are comments already
  if ($variables['comment'] != 1 || $variables['comment_count'] > 1 ) { 
  // add a custom $commentlink variable
    $variables['commentlink'] = l(
    // modify the output using format_plural
      format_plural($variables['comment_count'], '1 comment', '@count comments'), drupal_lookup_path('alias',$variables['uri']['path']),
      array('fragment' => 'comments')
    );
    // add a vertical pipe before the output.
    $variables['commentlink'] = ' | ' . $variables['commentlink'];
  }

  if ($variables['node']->type == 'article') {
    drupal_add_css(drupal_get_path('theme', 'mytheme') . '/css/node-article.css');
  }

}


/**
* Implements hook_form_FORM_ID_alter().
*/
function mytheme_form_user_login_block_alter(&$form) {
  // Remove the links provided by Drupal.
  unset($form['links']);

  // Set a weight for form actions so other elements can be placed
  // beneath them.
  $form['actions']['#weight'] = 5;

  // Shorter, inline request new password link.
  $form['actions']['request_password'] = array(
    '#markup' => l(t('Lost password'), 'user/password', array('attributes' => array('title' => t('Request new password via e-mail.')))),
  );  

  // New sign up link, with 'cuter' text.
  if (variable_get('user_register', USER_REGISTER_VISITORS_ADMINISTRATIVE_APPROVAL)) {
    $form['signup'] = array(
      '#markup' => l(t('Register - it’s free!'), 'user/register', array('attributes' => array('class' => 'button', 'id' => 'create-new-account', 'title' => t('Create a new user account.')))),
      '#weight' => 10, 
    );  
  }
}

function mytheme_preprocess_comment(&$variables) {

  // the following changes the "permalink" text. 
  $variables['permalink'] = l(t('(link)'), $uri['path'], array('html' => FALSE));
 
  $comment = $variables['elements']['#comment'];
	
	// the following requires you set a "tiny" image preset
	// go to Configuration > Media > Image styles to add
  $variables['picture'] = theme_get_setting('toggle_comment_user_picture') ? l(theme('image_style', array('style_name' => 'tiny', 'path' => $comment->picture->uri, 'getsize' => TRUE, 'attributes' => array('class' => 'thumbnail', 'title' => $comment->registered_name, 'alt' => $comment->registered_name))), 'user/'. $comment->u_uid, array('html' => TRUE, 'attributes' => array('title' => 'View user\'s Profile'))) : '';
}
