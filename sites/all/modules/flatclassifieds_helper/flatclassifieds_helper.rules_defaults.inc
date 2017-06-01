<?php
/**
 */

/**
 * Implementation of hook_default_rules_configuration().
 */
function flatclassifieds_helper_default_rules_configuration() {
  $items = array();
  $items['flatclassifieds_helper_featured_node'] = entity_import('rules_config', '{ "flatclassifieds_helper_featured_node" : {
      "LABEL" : "FlatClassifieds Helper Checkout Featured Node",
      "PLUGIN" : "reaction rule",
      "WEIGHT" : "10",
      "REQUIRES" : [ "flatclassifieds_helper", "commerce_checkout" ],
      "ON" : [ "commerce_checkout_complete", "commerce_order_insert", "commerce_order_update" ],
      "DO" : [
        { "flatclassifieds_helper_featured_associated_nodes" : {
            "USING" : { "order" : [ "commerce-order" ] },
            "PROVIDE" : {
              "line_items" : { "line_items" : "Associated Line items" },
              "nodes" : { "nodes" : "Associated Nodes" }
            }
          }
        }
      ]
    }
  }');
  $items['flatclassifieds_helper_highlight_node'] = entity_import('rules_config', '{ "flatclassifieds_helper_highlight_node" : {
      "LABEL" : "FlatClassifieds Helper Checkout Highlight Node",
      "PLUGIN" : "reaction rule",
      "WEIGHT" : "10",
      "REQUIRES" : [ "flatclassifieds_helper", "commerce_checkout" ],
      "ON" : [ "commerce_checkout_complete", "commerce_order_insert", "commerce_order_update" ],
      "DO" : [
        { "flatclassifieds_helper_highlight_associated_nodes" : {
            "USING" : { "order" : [ "commerce-order" ] },
            "PROVIDE" : {
              "line_items" : { "line_items" : "Associated Line items" },
              "nodes" : { "nodes" : "Associated Nodes" }
            }
          }
        }
      ]
    }
  }');
  $items['flatclassifieds_helper_sticky_node'] = entity_import('rules_config', '{ "flatclassifieds_helper_sticky_node" : {
      "LABEL" : "FlatClassifieds Helper Checkout Sticky Node",
      "PLUGIN" : "reaction rule",
      "WEIGHT" : "10",
      "REQUIRES" : [ "flatclassifieds_helper", "commerce_checkout" ],
      "ON" : [ "commerce_checkout_complete", "commerce_order_insert", "commerce_order_update" ],
      "DO" : [
        { "flatclassifieds_helper_sticky_associated_nodes" : {
            "USING" : { "order" : [ "commerce-order" ] },
            "PROVIDE" : {
              "line_items" : { "line_items" : "Associated Line items" },
              "nodes" : { "nodes" : "Associated Nodes" }
            }
          }
        }
      ]
    }
  }');
  return $items;
}
