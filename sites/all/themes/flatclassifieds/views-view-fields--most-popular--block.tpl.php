<?php print $fields['field_image_ca']->content;?>
<div class="mpop_txt">
  <?php print $fields['title']->content;?>
  <div class="mpop_price">
    <?php if ($fields['field_price']->content) print '<b>'.flatclassifieds_format_price($fields['field_price']->content, $fields['field_currency']->content).'</b>';?>
    <?php if ($fields['field_category']->content) print t('in !category', array('!category' => $fields['field_category']->content));?>
  </div>
</div>
<div class="clr"></div>