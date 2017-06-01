<?php
/**
 */

/**
 * Implements hook_rules_action_info
 */
function flatclassifieds_helper_rules_action_info() {
  $actions = array();

  $actions['flatclassifieds_helper_featured_associated_nodes'] = array(
    'label' => t('Featured associated nodes'),
    'parameter' => array(
      'order' => array(
        'type' => 'commerce_order',
        'label' => t('The completed order')
      ),
    ),
    'provides' => array(
      'line_items' => array(
        'type' => 'list<commerce_line_item>',
        'label' => t('Associated Line items'),
        'description' => t('All line items that had associated nodes'),
      ),
      'nodes' => array(
        'type' => 'list<node>',
        'label' => t('Associated Nodes'),
        'description' => t('The associated nodes'),
      ),
    ),
    'group' => t('FlatClassifieds Helper Node Checkout'),
  );
  
  $actions['flatclassifieds_helper_highlight_associated_nodes'] = array(
    'label' => t('Highlight associated nodes'),
    'parameter' => array(
      'order' => array(
        'type' => 'commerce_order',
        'label' => t('The completed order')
      ),
    ),
    'provides' => array(
      'line_items' => array(
        'type' => 'list<commerce_line_item>',
        'label' => t('Associated Line items'),
        'description' => t('All line items that had associated nodes'),
      ),
      'nodes' => array(
        'type' => 'list<node>',
        'label' => t('Associated Nodes'),
        'description' => t('The associated nodes'),
      ),
    ),
    'group' => t('FlatClassifieds Helper Node Checkout'),
  );
  
  $actions['flatclassifieds_helper_sticky_associated_nodes'] = array(
    'label' => t('Sticky associated nodes'),
    'parameter' => array(
      'order' => array(
        'type' => 'commerce_order',
        'label' => t('The completed order')
      ),
    ),
    'provides' => array(
      'line_items' => array(
        'type' => 'list<commerce_line_item>',
        'label' => t('Associated Line items'),
        'description' => t('All line items that had associated nodes'),
      ),
      'nodes' => array(
        'type' => 'list<node>',
        'label' => t('Associated Nodes'),
        'description' => t('The associated nodes'),
      ),
    ),
    'group' => t('FlatClassifieds Helper Node Checkout'),
  );
  
  return $actions;
}

/**
 * Rules action callback
 */

function flatclassifieds_helper_featured_associated_nodes($order) {
  //drupal_set_message('<pre>orderhighlight '. check_plain(print_r($order, 1)) .'</pre>');
  $line_items = $nodes = $db_items = $db_items_a = array();
  if ($order->status == 'completed') {
    $wrapper = entity_metadata_wrapper('commerce_order', $order);
    foreach ($wrapper->commerce_line_items as $delta => $line_item_wrapper) {
      $line_items[] = $line_item_wrapper;
      
      $product = $line_item_wrapper->commerce_product->value();
      $quantity = $line_item_wrapper->quantity->value();
      $node = $line_item_wrapper->ph_commerce_node->value();
      
      $nid = $node->nid;
      $sku = $product->sku;
      //drupal_set_message('<pre> '. check_plain(print_r($sku, 1)) .'</pre>');
      $ar = 'a_'.$nid.'_'.$sku.'_'.$order->order_number;
      //$ar = rand();
      $db_items[$ar] = $node;
      $db_items_a[$ar] = new stdClass;
      $db_items_a[$ar]->sku = $sku;
      //drupal_set_message('<pre> '. check_plain(print_r($sku, 1)) .'</pre>');
      
      if (isset($db_itemss[$ar]->quantity)) {
        $db_items_a[$ar]->quantity = $db_items_a[$ar]->quantity + $quantity;
      } else {
        $db_items_a[$ar]->quantity = $quantity;
      }
      //drupal_set_message('<pre>'.$ar.' '.check_plain(print_r($db_items[$ar]->sku, 1)).' '.$db_items[$ar]->quantity.'</pre>');
      //drupal_set_message('<pre>'.$ar.' '.check_plain(print_r($db_items[$ar], 1)) .'</pre>');
      $nodes[] = $node;
    }
    //drupal_set_message('<pre>highlight '. check_plain(print_r($db_items_a, 1)) .'</pre>');
    foreach ($db_items as $delta => $db_item) {  
      if ($db_items_a[$delta]->sku == 'pay_to_featured') {
        $endo = db_select('pch_timeline', 't')->fields('t', array('end'))->condition('t.oid', $order->order_number)->condition('t.nid', $db_item->nid)->condition('t.type', 'featured')->execute()->fetchField();
        $endm = db_select('pch_timeline', 't')->fields('t', array('end'))->condition('t.nid', $db_item->nid)->condition('t.type', 'featured')->condition('t.status', 1)->orderBy('t.end', 'DESC')->execute()->fetchField();
        if (!$endo and $endm) {  
          if ($endm > time()) {
            $query = db_insert('pch_timeline')
              ->fields(array('oid', 'nid', 'type', 'start', 'end', 'status'));
            $query->values(array(
              'oid' => $order->order_number,
              'nid' => $db_item->nid,
              'type' => 'featured',
              'start' => time(),
              'end' => $endm + 86400 * $db_items_a[$delta]->quantity,
              'status' => '1',
            ));
            $query->execute();
          } else {
            $query = db_insert('pch_timeline')
              ->fields(array('oid', 'nid', 'type', 'start', 'end', 'status'));
            $query->values(array(
              'oid' => $order->order_number,
              'nid' => $db_item->nid,
              'type' => 'featured',
              'start' => time(),
              'end' => time() + 86400 * $db_items_a[$delta]->quantity,
              'status' => '1',
            ));
            $query->execute();
          }
        } elseif (!$endo) {
          $query = db_insert('pch_timeline')
            ->fields(array('oid', 'nid', 'type', 'start', 'end', 'status'));
          $query->values(array(
            'oid' => $order->order_number,
            'nid' => $db_item->nid,
            'type' => 'featured',
            'start' => time(),
            'end' => time() + 86400 * $db_items_a[$delta]->quantity,
            'status' => '1',
          ));
          $query->execute();
          $db_item->promote = 1;
          //$node->uid = $order->uid;
          node_save($db_item);
        }
      }
    }
  }
  return array('line_items' => $line_items, 'nodes' => $nodes);
}

function flatclassifieds_helper_highlight_associated_nodes($order) {
  //drupal_set_message('<pre>orderhighlight '. check_plain(print_r($order, 1)) .'</pre>');
  $line_items = $nodes = $db_items = $db_items_a = array();
  if ($order->status == 'completed') {
    $wrapper = entity_metadata_wrapper('commerce_order', $order);
    foreach ($wrapper->commerce_line_items as $delta => $line_item_wrapper) {
      $line_items[] = $line_item_wrapper;
      
      $product = $line_item_wrapper->commerce_product->value();
      $quantity = $line_item_wrapper->quantity->value();
      $node = $line_item_wrapper->ph_commerce_node->value();
      
      $nid = $node->nid;
      $sku = $product->sku;
      //drupal_set_message('<pre> '. check_plain(print_r($sku, 1)) .'</pre>');
      $ar = 'a_'.$nid.'_'.$sku.'_'.$order->order_number;
      //$ar = rand();
      $db_items[$ar] = $node;
      $db_items_a[$ar] = new stdClass;
      $db_items_a[$ar]->sku = $sku;
      //drupal_set_message('<pre> '. check_plain(print_r($sku, 1)) .'</pre>');
      
      if (isset($db_itemss[$ar]->quantity)) {
        $db_items_a[$ar]->quantity = $db_items_a[$ar]->quantity + $quantity;
      } else {
        $db_items_a[$ar]->quantity = $quantity;
      }
      //drupal_set_message('<pre>'.$ar.' '.check_plain(print_r($db_items[$ar]->sku, 1)).' '.$db_items[$ar]->quantity.'</pre>');
      //drupal_set_message('<pre>'.$ar.' '.check_plain(print_r($db_items[$ar], 1)) .'</pre>');
      $nodes[] = $node;
    }
    //drupal_set_message('<pre>highlight '. check_plain(print_r($db_items_a, 1)) .'</pre>');
    foreach ($db_items as $delta => $db_item) {  
      if ($db_items_a[$delta]->sku == 'pay_to_highlight') {
        $endo = db_select('pch_timeline', 't')->fields('t', array('end'))->condition('t.oid', $order->order_number)->condition('t.nid', $db_item->nid)->condition('t.type', 'highlight')->execute()->fetchField();
        $endm = db_select('pch_timeline', 't')->fields('t', array('end'))->condition('t.nid', $db_item->nid)->condition('t.type', 'highlight')->condition('t.status', 1)->orderBy('t.end', 'DESC')->execute()->fetchField();
        if (!$endo and $endm) {  
          if ($endm > time()) {
            $query = db_insert('pch_timeline')
              ->fields(array('oid', 'nid', 'type', 'start', 'end', 'status'));
            $query->values(array(
              'oid' => $order->order_number,
              'nid' => $db_item->nid,
              'type' => 'highlight',
              'start' => time(),
              'end' => $endm + 86400 * $db_items_a[$delta]->quantity,
              'status' => '1',
            ));
            $query->execute();
          } else {
            $query = db_insert('pch_timeline')
              ->fields(array('oid', 'nid', 'type', 'start', 'end', 'status'));
            $query->values(array(
              'oid' => $order->order_number,
              'nid' => $db_item->nid,
              'type' => 'highlight',
              'start' => time(),
              'end' => time() + 86400 * $db_items_a[$delta]->quantity,
              'status' => '1',
            ));
            $query->execute();
          }
        } elseif (!$endo) {
          $query = db_insert('pch_timeline')
            ->fields(array('oid', 'nid', 'type', 'start', 'end', 'status'));
          $query->values(array(
            'oid' => $order->order_number,
            'nid' => $db_item->nid,
            'type' => 'highlight',
            'start' => time(),
            'end' => time() + 86400 * $db_items_a[$delta]->quantity,
            'status' => '1',
          ));
          $query->execute();
        }
      }
    }
  }
  return array('line_items' => $line_items, 'nodes' => $nodes);
}

function flatclassifieds_helper_sticky_associated_nodes($order) {
  //drupal_set_message('<pre>ordersticky '. check_plain(print_r($order, 1)) .'</pre>');
  $line_items = $nodes = $db_items = $db_items_a = array();
  if ($order->status == 'completed') {
    $wrapper = entity_metadata_wrapper('commerce_order', $order);
    foreach ($wrapper->commerce_line_items as $delta => $line_item_wrapper) {
      $product = $line_item_wrapper->commerce_product->value();
      $quantity = $line_item_wrapper->quantity->value();
      $line_items[] = $line_item_wrapper;
      $node = $line_item_wrapper->ph_commerce_node->value();
      $nid = $node->nid;
      $sku = $product->sku;
      $ar = $nid.'_'.$sku.'_'.$order->order_number;
      $db_items[$ar] = $node;
      $db_items_a[$ar] = new stdClass;
      $db_items_a[$ar]->sku = $sku;
      if (isset($db_items_a[$ar]->quantity)) {
        $db_items_a[$ar]->quantity = $db_items_a[$ar]->quantity + $quantity;
      } else {
        $db_items_a[$ar]->quantity = $quantity;
      }
      $nodes[] = $node;
    }
    //drupal_set_message('<pre>sticky '. check_plain(print_r($db_items, 1)) .'</pre>');
    foreach ($db_items as $delta => $db_item) {
      if ($db_items_a[$delta]->sku == 'pay_to_sticky') {
        $endo = db_select('pch_timeline', 't')->fields('t', array('end'))->condition('t.oid', $order->order_number)->condition('t.nid', $db_item->nid)->condition('t.type', 'sticky')->execute()->fetchField();
        $endm = db_select('pch_timeline', 't')->fields('t', array('end'))->condition('t.nid', $db_item->nid)->condition('t.type', 'sticky')->condition('t.status', 1)->orderBy('t.end', 'DESC')->execute()->fetchField();
        if (!$endo and $endm) {  
          if ($endm > time()) {
            $query = db_insert('pch_timeline')
              ->fields(array('oid', 'nid', 'type', 'start', 'end', 'status'));
            $query->values(array(
              'oid' => $order->order_number,
              'nid' => $db_item->nid,
              'type' => 'sticky',
              'start' => time(),
              'end' => $endm + 86400 * $db_items_a[$delta]->quantity,
              'status' => '1',
            ));
            $query->execute();
          } else {
            $query = db_insert('pch_timeline')
              ->fields(array('oid', 'nid', 'type', 'start', 'end', 'status'));
            $query->values(array(
              'oid' => $order->order_number,
              'nid' => $db_item->nid,
              'type' => 'sticky',
              'start' => time(),
              'end' => time() + 86400 * $db_items_a[$delta]->quantity,
              'status' => '1',
            ));
            $query->execute();
          }
          $db_item->sticky = 1;
          //$node->uid = $order->uid;
          node_save($db_item);
        } elseif (!$endo) {
          $query = db_insert('pch_timeline')
            ->fields(array('oid', 'nid', 'type', 'start', 'end', 'status'));
          $query->values(array(
            'oid' => $order->order_number,
            'nid' => $db_item->nid,
            'type' => 'sticky',
            'start' => time(),
            'end' => time() + 86400 * $db_items_a[$delta]->quantity,
            'status' => '1',
          ));
          $query->execute();
          $db_item->sticky = 1;
          //$node->uid = $order->uid;
          node_save($db_item);
        }
      }
    }
  } 
  return array('line_items' => $line_items, 'nodes' => $nodes);
}

