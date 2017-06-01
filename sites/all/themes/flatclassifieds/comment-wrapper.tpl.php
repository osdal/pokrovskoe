<div id="comments" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  
  <?php if ($content['comments'] && $node->type != 'forum'): ?>
    <?php print render($title_prefix); ?>
    <h2 class="title"><?php print t('Comments'); ?></h2>
    <?php print render($title_suffix); ?>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

  <?php if ($content['comment_form']): ?>
    <div class="clr">&nbsp;</div>
    <div class="comment-form-s">
    <?php global $user; print theme('user_picture', array('account' => $user)); ?>    
    <?php print render($content['comment_form']); ?>
    </div>
  <?php endif; ?>
  <div class="clr"></div>
</div>
<?php //print '<pre>'. check_plain(print_r($content, 1)) .'</pre>'; ?>	