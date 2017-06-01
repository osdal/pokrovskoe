<?php 
// unset($page['sidebar_top_social']);
// unset($page['sidebar_top_menu']);
// unset($page['sidebar_top_content']);
// unset($page['sidebar_filter']);
// unset($page['content']);
// unset($page['sidebar_left']);
// unset($page['footer_1']);
// unset($page['footer_2']);
// unset($page['footer_3']);
// unset($page['footer_4']);
// unset($page['footer_copyright']);
// unset($page['page_top']);
// unset($page['#views_contextual_links_info']);
// unset($page['footer_4']);
//unset($page['content']);
//flatclassifieds_bootstrap_container($page['content'], render($page['sidebar']));
// foreach ($page['content'] as $k => &$item) {
//   if (empty($item['#markup']) and (strpos($k, '#') === FALSE) ) {
//     $item['#prefix'] = '<div class="container"><div class="row"><div class="col-md-12">';
//     $item['#suffix'] = '</div></div></div>';
//   }
// }

//print '<pre>'. check_plain(print_r($page['content'], 1)) .'</pre>'; 
?>

<?php
if (empty($quantity)) $quantity = 0;

if (arg(1)) $arg1 = arg(1); else $arg1 = 0;
if (!(isset($page['content']['system_main']['nodes'][$arg1]) and isset($page['content']['system_main']['nodes'][$arg1]['#node']->type))) {
  $page['content']['system_main']['nodes'][$arg1]['#node'] = new stdClass;
  $page['content']['system_main']['nodes'][$arg1]['#node']->type = '';
}
$in1 = $in2 = '';
// if (
//     !$page['content']['system_main']['nodes'][$arg1]['#node']->type and
//     //!count($page['content']['system_main']['nodes']) and
//     arg(0) != 'blog' and
//     (arg(0) != 'node' or arg(1) == 'add' or arg(2)) and
//     arg(0) != 'search' and
//     arg(0) != 'classified' and
//     arg(0) != 'taxonomy'
//   ) {
//   $in1 = '<div class="bgw">';
//   $in2 = '</div>';
// }
// if ( arg(0) == 'classified' or (arg(0) == 'user' and arg(2) == 'classified')) {
//   $in1 = '<div class="bgww">';
//   $in2 = '</div>';
// }
// if (!$page['content']['system_main']['nodes'][$arg1]['#node']->type) { 
//   //$title = '<h1 class="title">'.$title.'</h1>'; 
// } elseif ($page['content']['system_main']['nodes'][$arg1]['#node']->type == 'blog') {
//   $title = t('Blog'); 
// } else {
//   //$title = ''; 
// }

if (arg(0) == 'taxonomy' and arg(1) == 'term' and is_numeric(arg(2))) flatclassifieds_get_c_icon(arg(2), 'title_icon');
$page_content = render($page['content']);
$tabss = render($tabs);
$action_linkss = render($action_links);
$sidebar = render($page['sidebar']);

print render($page['header']); 

if (isset($_GET['mob']) or arg(0) == 'nodes_mobile') {
  print '<div id="toolbar" class="top-mobile toolbar overlay-displace-top clearfix"><div class="toolbar-menu clearfix">'.flatclassifieds_helper_mobile_top_out().'</div></div>'; 
  print '<div class="body-mobile">'.$in1.($title ? ($in1 ? '' : '<div class="bgt">').'<h1 class="title">'.$title.'</h1>'.($in1 ? '' : '</div>') : '').$messages.render($page['sidebar_filter']).render($page['content']).$in2.'</div>';
} elseif (isset($_GET['ovr'])) {
  //print '<div class="ovr"><div class="node_pin_page"><div class="pin-node">'.render($page['content']).'</div></div></div>';
} else {

global $base_url;
/*
if ($order = commerce_cart_order_load($user->uid)) {
  $orderwrapper = entity_metadata_wrapper('commerce_order', $order);
  $quantity = commerce_line_items_quantity($orderwrapper->commerce_line_items, commerce_product_line_item_types());
}
*/

?>
<div class="bg_navbar">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php if ($language->dir == 'rtl') { ?>
          <div class="navbar navbar-default">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a href="<?php print check_url($front_page); ?>" title="<?php print $site_name; ?>" rel="home" id="logo" class="navbar-brand"><img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" /><?php print $site_name; ?></a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
            <?php echo str_replace(
              array('<ul class="menu">', '</a><ul class="nav navbar-nav">','expanded','leaf'), 
              array('<ul class="nav navbar-nav">','</a><ul class="dropdown-menu">', 'dropdown',''), 
              render($page['sidebar_top_menu'])); ?>
    
              <div class="nav navbar-nav navbar-right">
                <?php
                  global $user;
                  $out = '';
                if (theme_get_setting('tm_value_13'))
                  if (user_access('create '.theme_get_setting('tm_value_13').' content')) {
                    $out .= '<a href="'.url('node/add/'.str_replace('_','-',theme_get_setting('tm_value_13'))).'" class="addpost">'.t('Post your Ad!').'</a>';
                  } else {
                    $out .= '<a href="'.url('user').'" class="addpost">'.t('Post your Ad!').'</a>';
                  }
                  if ($user->uid) {
                    $out .= ' <a href="'.url('user/logout').'">'.t('Logout').'</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.url('user/'.$user->uid).'">'.t('Account').'</a>';
                  } else {
                    $out .= ' <a href="'.url('user/register').'">'.t('Register').'</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.url('user').'">'.t('Login').'</a>';
                  }
                  
                  print $out.render($page['sidebar_language']); 
                ?>
                <div class="clr"></div>
              </div>
            </div>
          </div>
        <?php } else { ?>        
          <div class="navbar navbar-default">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a href="<?php print check_url($front_page); ?>" title="<?php print $site_name; ?>" rel="home" id="logo" class="navbar-brand"><img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" /><?php print $site_name; ?></a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
            <?php echo str_replace(
              array('<ul class="menu">', '</a><ul class="nav navbar-nav">','expanded','leaf'), 
              array('<ul class="nav navbar-nav">','</a><ul class="dropdown-menu">', 'dropdown',''), 
              render($page['sidebar_top_menu'])); ?>
    
              <div class="nav navbar-nav navbar-right">
                <?php
                  global $user;
                  $out = '';
                  if ($user->uid) {
                    $out .= '<a href="'.url('user/'.$user->uid).'">'.t('Account').'</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.url('user/logout').'">'.t('Logout').'</a>';
                  } else {
                    $out .= ' <a href="'.url('user').'">'.t('Login').'</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.url('user/register').'">'.t('Register').'</a> ';
                  }
                if (theme_get_setting('tm_value_13'))
                  if (user_access('create '.theme_get_setting('tm_value_13').' content')) {
                    $out .= '<a href="'.url('node/add/'.str_replace('_','-',theme_get_setting('tm_value_13'))).'" class="addpost">'.t('Post your Ad!').'</a>';
                  } else {
                    $out .= '<a href="'.url('user').'" class="addpost">'.t('Post your Ad!').'</a>';
                  }
                  print render($page['sidebar_language']).$out; 
                ?>
                <div class="clr"></div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>


<?php /*
<div class="nav gmap">
  <div class="inn">
    <?php //echo render($page['sidebar_top_social']); ?>  
  </div>
</div>
  
<div class="nav premium">
  <div class="inn">
    <?php //echo render($page['sidebar_top_social']); ?>
  </div>
</div>
*/ ?>
<?php if ($sidebar_search = render($page['sidebar_search'])) { ?>
<div class="bg_search">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php print $sidebar_search; ?>
        <div class="clr"></div>
      </div>
    </div>
  </div>
  <div class="clr"></div>
</div>
<?php } ?>

<?php if ($title) { ?>
  <div class="bg_title">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
      <?php if ($c_price = flatclassifieds_get_c_price(FALSE, TRUE)) {  $c_price = '<div class="cf_price">'.$c_price.'</div>'; } ?>
      <?php if ($c_fivestars = flatclassifieds_fivestars_user(FALSE, TRUE)) {  $c_fivestars = '<div class="cf_price">'.$c_fivestars.'</div>'; } ?>
    <?php if ($c_icon = flatclassifieds_get_c_icon(FALSE, TRUE)) {  $c_icon = '<div class="cf_icon">'.$c_icon.'</div>'; } ?>
    <?php if ($title) { print '<h1 class="title">'.$c_icon.$title.$c_price.$c_fivestars.'</h1>'; } ?>
      
      <div class="clr"></div>
    </div>
    </div>
    </div>
    <div class="clr"></div>
  </div>
<?php } ?>
     
  <div class="bg_content">
    <?php if ((isset($messages) and $messages) or $action_linkss or $tabss) { ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php if ($action_links) {print '<ul class="primary"> '.render($action_links).' </ul>';} ?>
          <?php print ''.str_replace('</li>',' </li> ', $tabss).'<div class="clr"></div>';  ?>
          <?php if (isset($messages) and $messages) { print $messages.'<div class="clr"></div>'; } ?>
          <div class="clr">&nbsp;</div>
        </div>
      </div>
    </div>
    <?php } ?>
  
    <?php if (flatclassifieds_helper_is_page_manager()) {
      print $page_content;
    } else { ?>
      <div class="container">
        <div class="row">
          <?php if ($sidebar) { ?>
          <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            <?php print $page_content; ?>
          </div>
          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 sidebar-left-or-right-block">
            <?php print $sidebar; ?>
          </div>
          <?php } else { ?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <?php print $page_content; ?>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php } ?>
    <div class="clr"></div>
  </div>
  
  
  


<div class="footer container">
  <div class="row">
    <div class="col-md-3 col-sm-3"><?php print render($page['footer_1']); ?></div>
    <div class="col-md-3 col-sm-3"><?php print render($page['footer_2']); ?></div>
    <div class="col-md-3 col-sm-3"><?php print render($page['footer_3']); ?></div>
    <div class="col-md-3 col-sm-3"><?php print render($page['footer_4']); ?></div>
  </div>
  <div class="clr"></div>
</div>
<div class="bg_footer">
  <div class="footer_bottom container">
    <div class="row">
      <div class="col-md-6 col-sm-6"><?php print render($page['footer_copyright']); ?></div>
      <div class="col-md-6 col-sm-6 c_right"><a href="http://osdal.xyz" rel="nofollow">Разработка osdal</a></div>
    </div>
    <div class="clr"></div>
  </div>
</div>       
    

  <?php /*  <div class="scroll_top"><a href="#"><img src="<?php print $base_url.'/'.drupal_get_path('theme','flatclassifieds')?>/img/ar-3.png" width="50" height="50" /></a></div> */?>

   
      <?php //if (drupal_is_front_page()) { ?>

       
    
      <?php //if ($sidebar_right = render($page['sidebar_right']) and $page['content']['system_main']['nodes'][$arg1]['#node']->type != 'full_width') { ?>
        
          <?php //if($tabs and $tabs['#primary']) { print '<div class="tab-block">'.str_replace('</li>',' </li> ',render($tabs)).'</div>'; } ?>

          <?php //if (!$page['content']['system_main']['nodes'][$arg1]['#node']->type) {?>
            
          <?php //} ?>
          

<?php 
// unset($page['sidebar_top_social']);
// unset($page['sidebar_top_menu']);
// unset($page['sidebar_top_content']);
// unset($page['sidebar_filter']);
// unset($page['content']);
// unset($page['sidebar_left']);
// unset($page['footer_1']);
// unset($page['footer_2']);
// unset($page['footer_3']);
// unset($page['footer_4']);
// unset($page['footer_copyright']);
// unset($page['page_top']);
// unset($page['#views_contextual_links_info']);
// unset($page['footer_4']);
//unset($page['content']);
//print '<pre>'. check_plain(print_r($page['content'], 1)) .'</pre>'; ?>
<?php //print '<pre>'. check_plain(print_r(theme_get_setting('default_logo'), 1)) .'</pre>'; 
?>
<?php } ?>
