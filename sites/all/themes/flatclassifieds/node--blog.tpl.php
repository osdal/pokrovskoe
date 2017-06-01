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
 * - $node_url: Direct url of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
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
 * - $type: Node type, i.e. story, page, blog, etc.
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
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
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
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
 
$statistics = statistics_get($node->nid);
if (!$statistics) {  
  $statistics['totalcount'] = 0;
}
$count = format_plural($statistics['totalcount'], '1 view', '@count views');
if (empty($node->comment_count)) $node->comment_count = 0;
$comment = '';
if ($node->comment) $comment = '<i class="fa fa-comment indent-left-10"></i>  <a href="'.url("node/$node->nid", array('fragment' => 'comments')).'">'.format_plural($node->comment_count, '1 comment', '@count comments').'</a>';
?>
<?php if ($teaser) { ?>
  <div id="node-<?php print $node->nid; ?>" class="node_box <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <?php print render($title_prefix); ?>
    <?php print render($title_suffix); ?>
    <?php print render($content['field_image']); ?>
    <h2><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
    <?php if ($display_submitted): ?>
      <div class="submitted">
        <?php print t('<i class="fa fa-clock-o"></i> !data <i class="fa fa-user indent-left-10"></i> !author !comment <i class="fa fa-eye indent-left-10"></i> !view', array('!author' => $name, '!data' => $date, '!comment' => $comment, '!view' => $count)); ?>
      </div>
    <?php endif; ?>
    <div class="clr"></div>
  </div>
<?php } else { ?>
<div id="node-<?php print $node->nid; ?>" class="node_box <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
  <?php print render($content['field_image']); ?>
  <?php if ($display_submitted): ?>
    <div class="submitted">
      <?php print t('<i class="fa fa-clock-o"></i> !data <i class="fa fa-user indent-left-10"></i> !author !comment <i class="fa fa-eye indent-left-10"></i> !view', array('!author' => $name, '!data' => $date, '!comment' => $comment, '!view' => $count)); ?>
    </div>
  <?php endif; ?>
  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    print render($content);
  ?>
  <div class="clr"></div>
  <?php if ($links = render($content['links'])) { ?>
    <div class="n-links">
      <?php print $links; ?>
    </div>
  <?php } ?>
</div>
<div class="clr"></div>
<div class="node_com"><?php print render($content['comments']); ?></div>
<?php } ?>
<div class="clr"></div>
<?php //print '<pre>'. check_plain(print_r($node, 1)) .'</pre>'; ?>	