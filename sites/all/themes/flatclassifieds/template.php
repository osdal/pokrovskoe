<?php
function flatclassifieds_preprocess_html(&$variables) {
  global $base_url, $language;
  //drupal_set_message('<pre>'. check_plain(print_r($language, 1)) .'</pre>');
/*
  if (theme_get_setting('tm_value_5') != 'custom') {
    drupal_add_css(drupal_get_path('theme','flatclassifieds').'/type/'.theme_get_setting('tm_value_5').'.css', array('group' => CSS_THEME, 'preprocess' => FALSE));
    drupal_add_css(drupal_get_path('theme','flatclassifieds').'/type/'.theme_get_setting('tm_value_5').'_t.css', array('group' => CSS_THEME, 'preprocess' => FALSE));
  }
  if (theme_get_setting('tm_value_4') != 'custom') {
    drupal_add_css(drupal_get_path('theme','flatclassifieds').'/type/'.theme_get_setting('tm_value_4').'.css', array('group' => CSS_THEME, 'preprocess' => FALSE));
    drupal_add_css(drupal_get_path('theme','flatclassifieds').'/type/'.theme_get_setting('tm_value_4').'_b.css', array('group' => CSS_THEME, 'preprocess' => FALSE));
  }
*/
  drupal_add_js('misc/form.js');
  drupal_add_js('misc/collapse.js');
  //drupal_add_css(drupal_get_path('theme','flatclassifieds').'/color/'.theme_get_setting('tm_value_3').'.css', array('group' => CSS_THEME, 'preprocess' => FALSE));
  if (isset($_GET['mob']) and $_GET['mob']) {
    drupal_add_css(drupal_get_path('theme','flatclassifieds').'/css/mobile.css');
    drupal_add_js(drupal_get_path('theme','flatclassifieds').'/js/cordova-2.4.0.js');
    drupal_add_js('

document.addEventListener("resume", onDeviceResume, false);

  function uploadPH() {
    //alert("An error has occurred: Code = ");
    // Retrieve image file location from specified source
    navigator.camera.getPicture(uploadPhoto,
      function(message) { alert(\'get picture failed\'); },
      { quality: 50, destinationType: navigator.camera.DestinationType.FILE_URI, sourceType: navigator.camera.PictureSourceType.PHOTOLIBRARY, correctOrientation: true}
    );
    //return false;
  }

  function uploadPhoto(imageURI) {
    var options = new FileUploadOptions();
    options.fileKey="file";
    options.fileName=imageURI.substr(imageURI.lastIndexOf(\'/\')+1);
    options.mimeType="image/jpeg";

    var params = new Object();
    params.value1 = "test";
    params.value2 = "param";

    options.params = params;

    var ft = new FileTransfer();
    ft.upload(imageURI, encodeURI("'.url('mobilefileupload', array('absolute' => TRUE, 'query' => array('mob' => '1'))).'"), win, fail, options);
  }

  function win(r) {
    //console.log("Code = " + r.responseCode);
    //console.log("Response = " + r.response);
    //console.log("Sent = " + r.bytesSent);
    if (r.response) {
      window.location.replace(\''.url('node/add/classified', array('absolute' => TRUE, 'query' => array('mob' => '1'))).'&fid=\'+r.response);
    }
  }

  function fail(error) {
    alert("An error has occurred: Code = " + error.code);
    //console.log("upload error source " + error.source);
    //console.log("upload error target " + error.target);
  }



function onDeviceResume() {
    window.location.reload(1);
    //uploadPH();
}

    ', array('type' => 'inline',  'scope' => 'header', 'weight' => 5));

  }
}

function flatclassifieds_get_term_icon ($tid, $style_name = 'teaser_icon') {
  $query = db_select('field_data_field_icon_fa', 'i');
  $query->condition('i.entity_id', $tid);
  $query->fields('i', array('field_icon_fa_value'));
  $icon = $query->execute()->fetchField();

  $query = db_select('field_data_field_color_icon', 'i');
  $query->condition('i.entity_id', $tid);
  $query->fields('i', array('field_color_icon_jquery_colorpicker'));
  $color = $query->execute()->fetchField();

  $query = db_select('field_data_field_background_color_icon', 'i');
  $query->condition('i.entity_id', $tid);
  $query->fields('i', array('field_background_color_icon_jquery_colorpicker'));
  $background = $query->execute()->fetchField();

  if ($icon and $icon != '_none') {
    return '<div class="termimg"><div class="termimgico '.$style_name.'" style="'.($color ? 'color:#'.$color.';' : '').($background ? 'background-color:#'.$background.';' : '').'">'.$icon.'</div></div>';
  } else {
    $query = db_select('field_data_field_icon', 'i');
    $query->condition('i.entity_id', $tid);
    $query->fields('i', array('field_icon_fid', 'field_icon_alt', 'field_icon_title', 'field_icon_width', 'field_icon_height'));
    $result = $query->execute();
    foreach ($result as $item) {
      if ($item->field_icon_fid && ($file = file_load($item->field_icon_fid))) {
        $variables = array();
        $variables['alt'] = $item->field_icon_alt;
        $variables['title'] = $item->field_icon_title;
        $variables['width'] = $item->field_icon_width;
        $variables['height'] = $item->field_icon_height;
        $variables['style_name'] = $style_name;
        $variables['path'] = $file->uri;
      }
    }
    if (isset($variables)) {
      return '<div class="termimg">'.theme('image_style', $variables).'</div>';
    } else {
      $terms = taxonomy_get_parents($tid);
      //drupal_set_message('<pre>'. check_plain(print_r($terms, 1)) .'</pre>');
      foreach ($terms as $item) {
        if (isset($item->tid)) {
          return flatclassifieds_get_term_icon($item->tid, $style_name);
        }
      }
      return '';
    }
  }
}

function flatclassifieds_fivestars_user($txt, $view = FALSE) {
  static $out = '';
  if ($txt) {
    $out .= $txt;
  }
  if ($out and $view) {
    return $out;
  }
}

function flatclassifieds_nodegooglemap_markers($txt, $view = FALSE) {
  static $out = '';
  if ($txt) {
    $out .= $txt;
  }
  if ($out and $view) {
    return $out;
  }
}
function flatclassifieds_nodegooglemap_overlays($txt, $view = FALSE) {
  static $out = '';
  if ($txt) {
    $out .= $txt;
  }
  if ($out and $view) {
    return $out;
  }
}
function flatclassifieds_biggooglemap_markers($txt, $view = FALSE) {
  static $out = '';
  if ($txt) {
    $out .= $txt;
  }
  if ($out and $view) {
    return $out;
  }
}
function flatclassifieds_biggooglemap_overlays($txt, $view = FALSE) {
  static $out = '';
  if ($txt) {
    $out .= $txt;
  }
  if ($out and $view) {
    return $out;
  }
}
function flatclassifieds_biggooglemap_icon() {
  static $out = '';
  if (!$out) {
    global $base_url;
    $out = $base_url.'/'.drupal_get_path('theme','flatclassifieds').'/i/bg2.png';
  }
  return $out;
}

function flatclassifieds_get_c_img($txt, $view = FALSE) {
  static $out = '';
  if ($txt) {
    $out = $txt;
  }
  if ($out and $view) {
    return $out;
  }
}
function flatclassifieds_get_c_price($txt, $view = FALSE) {
  static $out = '';
  if ($txt) {
    $out = $txt;
  }
  if ($out and $view) {
    return $out;
  }
}
function flatclassifieds_get_c_icon($txt, $view = FALSE) {
  static $out = '';
  if ($txt) {
    $out = flatclassifieds_get_term_icon($txt, 'body_icon');
  }
  if ($out and $view) {
    return $out;
  }
}

function flatclassifieds_is_googlemap($txt, $view = FALSE) {
  static $out = '';
  if ($txt) {
    $out = $txt;
  }
  if ($out and $view) {
    return $out;
  }
}

function flatclassifieds_format_price($p, $c = 'USD') {
  static $cur = array();
  if (!$p) return '';
  if (!count($cur)) {
    $cur = flatclassifieds_helper_currency_info();
  }
  $p = str_replace(array('.00', ',00', ' '), array('', '', '&nbsp;'), $p);
  if (isset($cur[$c])) {
    if (isset($cur[$c]['symbol_placement']) and $cur[$c]['symbol_placement'] == 'after') {
      return $p.$cur[$c]['symbol'];
    } else {
      return $cur[$c]['symbol'].$p;
    }
  } else {
    return '$'.$p;
  }
  return $out;
}

function flatclassifieds_bootstrap_container(&$var, $sidebar) {
  static $out_sidebar = TRUE;
  foreach ($var as $k => &$item) {
    if ((strpos($k, '#') === FALSE) and _flatclassifieds_bootstrap_container($item)) {
      if ($sidebar) {
        $item['#prefix'] = '<div class="container"><div class="row"><div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">';
        $item['#suffix'] = '</div><div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 sidebar-left-or-right-block">'.$sidebar.'</div></div></div>';
      } else {
        $item['#prefix'] = '<div class="container"><div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
        $item['#suffix'] = '</div></div></div>';
      }
    }
  }
}

function _flatclassifieds_bootstrap_container(&$var) {
  $se = TRUE;
  foreach ($var as $k => &$item) {
    if ((strpos($k, '#') === FALSE) and is_array($item)) {
      if (isset($item['#markup'])) {
        //drupal_set_message('<pre>'.$k.' - '. check_plain(print_r($item, 1)) .'</pre>');
        if (strrpos($item['#markup'], '<div class="panel-bootstrap') !== FALSE) {
          $se = FALSE;
          return $se;
        }
      } else {
        $se = _flatclassifieds_bootstrap_container($item);
      }
      //drupal_set_message('<pre>'.$k.' - '. check_plain(print_r($item, 1)) .'</pre>');
    }
  }
  return $se;
}

function flatclassifieds_color_prepare($var) {
  if ((strpos($var, '#') === FALSE) and $var != 'transparent') {
    return '#'.$var;
  }
  return $var;
}

function flatclassifieds_truncate_utf8($string, $len, $wordsafe = FALSE, $dots = FALSE, &$ll = 0) {

  if (drupal_strlen($string) <= $len) {
    return $string;
  }

  if ($dots) {
    $len -= 4;
  }

  if ($wordsafe) {
    $string = drupal_substr($string, 0, $len + 1); // leave one more character
    if ($last_space = strrpos($string, ' ')) { // space exists AND is not on position 0
      $string = substr($string, 0, $last_space);
      $ll = $last_space;
    }
    else {
      $string = drupal_substr($string, 0, $len);
	  $ll = $len;
    }
  }
  else {
    $string = drupal_substr($string, 0, $len);
	$ll = $len;
  }

  if ($dots) {
    $string .= '...';
  }

  return $string;
}
