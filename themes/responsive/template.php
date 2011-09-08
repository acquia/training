<?php

function responsive_pager($tags = array(), $limit = 10, $element = 0, $parameters = array(), $quantity = 9) {	  global $pager_total;	  $li_previous = theme('pager_previous', (isset($tags[1]) ? $tags[1] : t('‹ previous')), $limit, $element, 1, $parameters);	  $li_next = theme('pager_next', (isset($tags[3]) ? $tags[3] : t('next ›')), $limit, $element, 1, $parameters);
  if ($pager_total[$element] > 1) { 
    if ($li_previous) {      $items[] = array(
        'class' => 'pager-previous',
        'data' => $li_previous,      );    } // End generation. 
    if ($li_next) {      $items[] = array(
        'class' => 'pager-next',
        'data' => $li_next,      );
    } 
    return theme('item_list', $items, NULL, 'ul', array('class' => 'pager'));  }}