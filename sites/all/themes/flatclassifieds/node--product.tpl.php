<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
 
 flatclassifieds_helper_fields_filter($content);
$count = 0;
if (function_exists('statistics_get')) {
  $statistics = statistics_get($node->nid);
  if ($statistics) {
    $count = $statistics['totalcount'];
  }
}
$countt = format_plural($count, '1 view', '@count views');
if (function_exists('_classified_get')) {
  $date_format = _classified_get('date-format');
  $c_created = strftime($date_format, $node->created);
} else {
  $c_created = format_date($node->created, 'custom', 'm/d/Y');
}
if (empty($content['field_price'][0]['#markup'])) $content['field_price'][0]['#markup'] = 0;
$price = render($content['product:commerce_price']);
?>
<?php if ($teaser) { ?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php $field_price = '<div class="field-name-field-price"><div class="field-item">'.$price.'</div></div>'; ?>
  
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
  <div class="fcimg">
    <?php print render($content['field_image_ca']); ?>
    <?php if (isset($content['field_category']['#items'][0]['tid'])) print flatclassifieds_get_term_icon($content['field_category']['#items'][0]['tid']); ?>
  </div>
  <div class="fcinfo">
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print flatclassifieds_truncate_utf8($title, 50, TRUE, TRUE); ?></a></h2>
    <?php print $field_price; ?>
    <div class="content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['field_image_ca']);
      hide($content['field_category']);
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
    </div>
  </div>
  <?php //print render($content['links']); ?>
  <?php //print render($content['comments']); ?>

</div>
<?php } else { ?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php //print $user_picture; ?>
  <div class="clblock">
    <div class="clcontact">
      <div class="clblock_in">
        <?php print '<h3>'.$price.'</h3>'; ?>
        <?php print render($content['field_product_p']); ?>
        <div class="clr"></div>
      </div>
    </div>
    <div class="cldata">
      <div class="clblock_in">
        <?php print render($content['field_category']); ?>
        <?php print render($content['field_rating']); ?>
        <div class="clr"></div>
      </div>
    </div>  
  </div>
  <div class="clr"></div>
  <?php print render($content['sharethis']); ?>
  
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      flatclassifieds_get_c_img(render($content['field_image_ca']));
      flatclassifieds_get_c_price($price);
      flatclassifieds_get_c_icon($content['field_category']['#items'][0]['tid'], 'title_icon');
      
      hide($content['comments']);
      hide($content['field_price']);
      hide($content['field_currency']);
      hide($content['links']);
      print render($content);
    ?>
  </div>

  <?php //print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</div>
<?php } ?>
<?php //print '<pre>'. check_plain(print_r($content, 1)) .'</pre>'; ?>	
