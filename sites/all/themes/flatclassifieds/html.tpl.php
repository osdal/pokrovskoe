<!DOCTYPE html>
<html lang=<?php print $language->language; ?> dir="<?php print $language->dir; ?>">
<?php /*
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>" lang="<?php print $language->language; ?>">
*/ ?>
<head>
  <?php global $base_url; ?>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />

  <?php if (theme_get_setting('tm_value_14')) { ?>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <?php if ($language->dir == 'rtl') { ?>
      <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.1.1/css/bootstrap-rtl.min.css" rel="stylesheet">
    <?php } ?>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <?php } else { $path = libraries_get_path('bootstrap'); ?>
    <link href="<?php print $base_url.'/'.$path; ?>/css/bootstrap.min.css" rel="stylesheet">
    <?php if ($language->dir == 'rtl') { ?>
      <link href="<?php print $base_url.'/'.drupal_get_path('theme','flatclassifieds') ?>/css/bootstrap-rtl.min.css" rel="stylesheet">
    <?php } ?>
    <link href="<?php print $base_url.'/'.libraries_get_path('awesome') ?>/css/font-awesome.min.css" rel="stylesheet">
  <?php } ?>

  <?php print $styles; ?>
  <?php if (empty($_GET['mob'])) $_GET['mob'] = 0; ?>
  <?php /*if (theme_get_setting('tm_value_4') == 'custom' and theme_get_setting('tm_value_13')) { ?>
    <link href='http://fonts.googleapis.com/css?family=<?php print theme_get_setting('tm_value_13') ?>' rel='stylesheet' type='text/css'>
  <?php } ?>
  <?php if (theme_get_setting('tm_value_5') == 'custom' and theme_get_setting('tm_value_12')) { ?>
    <link href='http://fonts.googleapis.com/css?family=<?php print theme_get_setting('tm_value_12') ?>' rel='stylesheet' type='text/css'>
  <?php } */?>
  <style type="text/css">
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_header_background'))) { ?>
      .bg_navbar {background-color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_header_search_background'))) { ?>
      .bg_search {background-color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_header_text'))) { ?>
      .bg_navbar,
      .bg_search
      {color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_header_link'))) { ?>
      .navbar-default .navbar-nav > li > a,
      .bg_navbar a,
      .navbar-nav > li > .dropdown-menu a:hover,
      .navbar-default .navbar-brand
      {color: <?php print $val ?>;}
      .navbar-nav > li > .dropdown-menu,
      .navbar-nav > li > .dropdown-menu .dropdown-menu,
      .navbar-default .navbar-nav > li > a:hover,
      .navbar-default .navbar-nav > li > a:focus,
      .navbar-default .navbar-nav > li:hover > a
      {background-color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_header_hover'))) { ?>
      .navbar-nav > li > .dropdown-menu a:hover
      {background-color: <?php print $val ?>;}
      .navbar-nav > li > .dropdown-menu,
      .bg_navbar a:hover,
      .navbar-default .navbar-brand:hover,
      .navbar-nav > li > .dropdown-menu .dropdown-menu,
      .navbar-nav > li > .dropdown-menu a,
      .navbar-default .navbar-nav > li > a:hover,
      .navbar-default .navbar-nav > li > a:focus,
      .navbar-default .navbar-nav > li:hover > a
      {color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_header_button'))) { ?>
      a.addpost
      {color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_header_button_background'))) { ?>
      a.addpost
      {background-color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_header_button_hover'))) { ?>
      a.addpost:hover
      {color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_header_button_background_hover'))) { ?>
      a.addpost:hover
      {background-color: <?php print $val ?>;}
    <?php } ?>


    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_content_background'))) { ?>
      .bg_title,
      .bg_content
      {background-color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_content_text'))) { ?>
      h1.title,
      .bg_content h1, .bg_content h2, .bg_content h3, .bg_content h4, .bg_content h5, .bg_content h6,
      .bg_title,
      .submitted,
      .view-most-popular .mpop_price,
      .view-most-popular .mpop_price b,
      .view-most-popular .view-header p,
      .bg_content
      {color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_content_link'))) { ?>
      .bg_title a,
      .bg_content a
      {color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_content_hover'))) { ?>
      .bg_title a:hover,
      .bg_content a:hover
      {color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_content_button'))) { ?>
      .bg_content input.form-submit,
      .price_plans a
      {color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_content_button_background'))) { ?>
      .bg_content input.form-submit,
      .price_plans a
      {background-color: <?php print $val ?>; border: 1px solid <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_content_button_hover'))) { ?>
      .bg_content input.form-submit:hover,
      .price_plans a:hover
      {color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_content_button_background_hover'))) { ?>
      .bg_content input.form-submit:hover,
      .price_plans a:hover
      {background-color: <?php print $val ?>; border: 1px solid <?php print $val ?>;}
    <?php } ?>

     <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_content_dark_background'))) { ?>
      .pane-plain-box-left-or-right-block-region,
      .sidebar-left-or-right-block .block,
      #comments,
      .row_dark
      {background-color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_content_dark_text'))) { ?>
      .bg_content .pane-plain-box-left-or-right-block-region,
      .bg_content .sidebar-left-or-right-block .block,
      .bg_content .pane-plain-box-left-or-right-block-region h1,
      .bg_content .sidebar-left-or-right-block .block h1,
      .bg_content .pane-plain-box-left-or-right-block-region h2,
      .bg_content .sidebar-left-or-right-block .block h2,
      .bg_content .pane-plain-box-left-or-right-block-region h3,
      .bg_content .sidebar-left-or-right-block .block h3,
      .bg_content .pane-plain-box-left-or-right-block-region h4,
      .bg_content .sidebar-left-or-right-block .block h4,
      .bg_content .pane-plain-box-left-or-right-block-region h5,
      .bg_content .sidebar-left-or-right-block .block h6,
      .bg_content .pane-plain-box-left-or-right-block-region h6,
      .bg_content .sidebar-left-or-right-block .block h6,
      .bg_content .pane-plain-box-left-or-right-block-region .submitted,
      .bg_content .sidebar-left-or-right-block .block .submitted,
      .bg_content .sidebar-left-or-right-block .block .view-most-popular .mpop_price,
      .bg_content .pane-plain-box-left-or-right-block-region .view-most-popular .mpop_price,
      .bg_content .sidebar-left-or-right-block .block .view-most-popular .mpop_price b,
      .bg_content .pane-plain-box-left-or-right-block-region .view-most-popular .mpop_price b,
      .bg_content .sidebar-left-or-right-block .block .view-most-popular .view-header p,
      .bg_content .pane-plain-box-left-or-right-block-region .view-most-popular .view-header p,
      #comments,
      .bg_content .row_dark,
      .bg_content .row_dark h1,
      .bg_content .row_dark h2,
      .bg_content .row_dark h3,
      .bg_content .row_dark h4,
      .bg_content .row_dark h5,
      .bg_content .row_dark h6,
      .bg_content .row_dark .submitted,
      .bg_content .row_dark .view-most-popular .mpop_price,
      .bg_content .row_dark .view-most-popular .mpop_price b,
      .bg_content .row_dark .view-most-popular .view-header p

      {color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_content_dark_link'))) { ?>
      .pane-plain-box-left-or-right-block-region a,
      .bg_content .sidebar-left-or-right-block .block a,
      #comments a
      {color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_content_dark_hover'))) { ?>
      .pane-plain-box-left-or-right-block-region a:hover,
      .bg_content .sidebar-left-or-right-block .block a:hover,
      #comments a:hover
      {color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_content_dark_button'))) { ?>
      .bg_content .sidebar-left-or-right-block .block input.form-submit,
      .bg_content .pane-plain-box-left-or-right-block-region .block input.form-submit,
      .bg_content .sidebar-left-or-right-block .block .price_plans a ,
      .bg_content .pane-plain-box-left-or-right-block-region .block .price_plans a,
      .bg_content .row_dark input.form-submit,
      .bg_content .row_dark .price_plans a,
      #comments input[type="submit"]
      {color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_content_dark_button_background'))) { ?>
      .bg_content .sidebar-left-or-right-block .block input.form-submit,
      .bg_content .pane-plain-box-left-or-right-block-region .block input.form-submit,
      .bg_content .sidebar-left-or-right-block .block .price_plans a ,
      .bg_content .pane-plain-box-left-or-right-block-region .block .price_plans a,
      .bg_content .row_dark input.form-submit,
      .bg_content .row_dark .price_plans a,
      #comments input[type="submit"]
      {background-color: <?php print $val ?>; border: 1px solid <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_content_dark_button_hover'))) { ?>
      .bg_content .sidebar-left-or-right-block .block input.form-submit:hover,
      .bg_content .pane-plain-box-left-or-right-block-region .block input.form-submit:hover,
      .bg_content .sidebar-left-or-right-block .block .price_plans a:hover ,
      .bg_content .pane-plain-box-left-or-right-block-region .block .price_plans a:hover,
      .bg_content .row_dark input.form-submit,
      .bg_content .row_dark .price_plans a,
      #comments input[type="submit"]:hover
      {color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_content_dark_button_background_hover'))) { ?>
      .bg_content .sidebar-left-or-right-block .block input.form-submit:hover,
      .bg_content .pane-plain-box-left-or-right-block-region .block input.form-submit:hover,
      .bg_content .sidebar-left-or-right-block .block .price_plans a:hover ,
      .bg_content .pane-plain-box-left-or-right-block-region .block .price_plans a:hover,
      .bg_content .row_dark input.form-submit,
      .bg_content .row_dark .price_plans a,
      #comments input[type="submit"]:hover
      {background-color: <?php print $val ?>; border: 1px solid <?php print $val ?>;}
    <?php } ?>

    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_footer_background'))) { ?>
      body {background-color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_footer_text'))) { ?>
      .footer {color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_footer_link'))) { ?>
      .footer ul.menu a,
      .footer a
      {color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_footer_hover'))) { ?>
      .footer ul.menu a:hover,
      .footer a:hover
      {color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_footer_button'))) { ?>
      .footer input.form-submit {color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_footer_button_background'))) { ?>
      .footer input.form-submit {background-color: <?php print $val ?>; border: 1px solid <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_footer_button_hover'))) { ?>
      .footer input.form-submit:hover {color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_footer_button_background_hover'))) { ?>
      .footer input.form-submit:hover {background-color: <?php print $val ?>; border: 1px solid <?php print $val ?>;}
    <?php } ?>


    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_copyright_background'))) { ?>
      .bg_footer {background-color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_copyright_text'))) { ?>
      .bg_footer {color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_copyright_link'))) { ?>
      .bg_footer a {color: <?php print $val ?>;}
    <?php } ?>
    <?php if ($val = flatclassifieds_color_prepare(theme_get_setting('tm_value_color_copyright_hover'))) { ?>
      .bg_footer a:hover {color: <?php print $val ?>;}
    <?php } ?>

  </style>

  <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <?php /* <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false&amp;language=en"></script> */ ?>

<?php
if (flatclassifieds_is_googlemap(FALSE, TRUE)) {
  $gmapapikey = theme_get_setting('tm_value_gmap_api_key');
  if ($gmapapikey) {
    $gmapapikey = 'key='.$gmapapikey.'&';
  }
  print '<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?'.$gmapapikey.'sensor=false&language=en"></script>';
}
?>

  <?php print $scripts; ?>

</head>
<body class="<?php print $classes; ?><?php if ($user->uid == 1) print ' user_admin'; ?>" <?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php if (!$_GET['mob']) print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  <?php if (theme_get_setting('tm_value_14')) { ?>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <?php } else { ?>
    <script src="<?php print $base_url.'/'.$path ?>/js/bootstrap.min.js"></script>
  <?php } ?>


</body>
</html>
