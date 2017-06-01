<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if ($block->subject): ?>
    <div class="title"><?php print $block->subject ?></div>
  <?php endif;?>
  <?php print render($title_suffix); ?>
  <div class="content"<?php print $content_attributes; ?>>
    <?php print $content ?>
    <div class="clr"></div>
  </div>
  <div class="clr"></div>
</div>
<?php //print '<pre>'. check_plain(print_r($block, 1)) .'</pre>'; ?>	